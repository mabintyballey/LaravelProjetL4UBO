<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Matiere;
use App\Http\Requests\UpdateMatiereRequest;
use App\Models\Classe;
use App\Models\Departement;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $matieres = Matiere::when($search, function ($query, $search) {
             return $query->where('nom', 'like', "%$search%"); 
        })->paginate(4);
        $classes = Classe::all();
        $departements = Departement::all();
        return view('administration.pages.matieres.index', compact('matieres', 'classes', 'departements')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administration.pages.matieres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
   {
          try {
              $request->validate([
                  'nom' => 'required|min:3',  
                  'classe_id' => 'required|exists:classes,id',  
                ]);
          } catch (\Illuminate\Validation\ValidationException $e) {
              return response()->json(['error' => $e->errors()], 400);
            }

    // Vérifier si la matière existe déjà dans la classe
    $existingMatiere = Matiere::where('classe_id', $request->classe_id)
                              ->where('nom', $request->nom)
                              ->first();

    if ($existingMatiere) {
        return response()->json(['error' => 'Cette matière existe déjà dans cette classe. Veuillez choisir un autre nom.'], 400);
    }

        $matiere = Matiere::create([
            'nom' => $request->nom,
            'classe_id' => $request->classe_id,
        ]);

        return response()->json(['matiere' => $matiere], 200);
   }
     
    /**
     * Display the specified resource.
     */
    public function show(Matiere $matiere)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matiere $matiere)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatiereRequest $request, Matiere $matiere)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function getClassesByDepartement($departementId)
    {
         $classes = Classe::where('departement_id', $departementId)->get();
         return response()->json(['classes' => $classes]);
    }

    public function destroy(Matiere $matiere)
   {
        try {
            $matiere->delete();
            return response()->json(['message' => 'Matière supprimée avec succès.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la suppression de la matière.'], 500);
        }
   }

}
