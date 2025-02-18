<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateClasseRequest;
use App\Models\Departement;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classe::all();
        $departements = Departement::all();
        return view('administration.pages.classes.index', compact('classes', 'departements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'departement_id' => 'required|exists:departements,id',
        ]);
    
        // Vérifier si la classe existe déjà dans ce département
        $existingClasse = Classe::where('nom', $request->nom)
                                ->where('departement_id', $request->departement_id)
                                ->first();
    
        if ($existingClasse) {
            return response()->json(['error' => 'Cette classe existe déjà dans ce département'], 400);
        }
    
        $classe = new Classe();
        $classe->nom = $request->nom;
        $classe->departement_id = $request->departement_id;
        $classe->save();
    
        return response()->json(['classe' => $classe], 200);
    }

    
    public function getClassesByDepartement($departementId)
    {
        $classes = Classe::where('departement_id', $departementId)->get();
        return response()->json(['classes' => $classes]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classe $classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClasseRequest $request, Classe $classe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classe $classe)
    {
        //
    }
    //methode pour afficher les matieres lier à une classe
    public function getMatieres($id) {
        $classe = Classe::find($id);
    
        if (!$classe) {
            return response()->json(['error' => 'Classe non trouvée'], 404);
        }
        $matieres = $classe->matieres;
    
        return response()->json([
            'niveau' => $classe->niveau,  
            'matieres' => $matieres      
        ]);
    }
    
    
    
}
