<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Licence;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    // Affiche la page des départements
    public function index()
    {
        $departements = Departement::ALL(); // On récupère tous les départements avec leurs licences associées.
    
        return view('administration.pages.departement', compact('departements'));
    }
    
    public function store(Request $request)
{
    // Validation des données
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
    ]);

    // Création du département et récupération de l'objet créé
    $departement = Departement::create([
        'nom' => $validated['nom'],
    ]);

    // Retourner la réponse avec l'objet département, y compris l'ID auto-incrémenté
    return response()->json([
        'departement' => $departement
    ], 201);
}

public function destroy($id)
{
    // Trouver le département par ID et le supprimer
    $departement = Departement::findOrFail($id);
    $departement->delete();

    // Retourner une réponse
    return response()->json(['message' => 'Département supprimé avec succès']);
}

   
}

