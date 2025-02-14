<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Matiere;
use App\Http\Requests\StoreMatiereRequest;
use App\Http\Requests\UpdateMatiereRequest;

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
        return view('administration.pages.matieres.index', compact('matieres')); 
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
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);
    
        try {
            $matiere = Matiere::create([
                'nom' => $request->nom,
            ]);
    
            return response()->json($matiere, 201); // Retourner la matière ajoutée en JSON
    
        } catch (\Exception $e) {
            // Si une exception se produit, retourner une erreur
            return response()->json(['error' => 'Erreur lors de l\'ajout de la matière.'], 500);
        }
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
