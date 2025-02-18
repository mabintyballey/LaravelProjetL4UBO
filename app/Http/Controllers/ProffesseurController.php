<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Professeur;

class ProffesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$professeurs = User::where('role_id', '=', 1)->get();

        $professeurs = User::whereHas('role', function ($query) {
            $query->where('nom', 'professeur');
        })->get();

        return view('administration.pages.professeur-list', [
            'professeurs' => $professeurs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('administration.pages.professeur-create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $professeur = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'age' => $request->age,
            'email' => $request->email,
            'matricule' => $this->generateMatricule(),
            'genre' => $request->genre,
            'password' => Hash::make('password'),
            'role_id' => 1
        ]);

        $professeur->save();

        return redirect()->route('proffesseur.list')->with('success', 'Insertion effectué avec succès');
    }

    public function generateMatricule() {
        return 'M00' . time();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Trouver le professeur par son ID
        $professeur = Professeur::findOrFail($id);
    
        // Retourner la vue avec les détails du professeur
        return view('professeur.show', compact('professeur'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    // Méthode pour afficher le formulaire d'édition
        public function edit($id)
    {
        $professeur = Professeur::findOrFail($id);
        return view('professeur.edit', compact('professeur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy($id)
{
    $professeur = Professeur::find($id);

    if ($professeur) {
        $professeur->delete();
        return response()->json(['message' => 'Professeur supprimé avec succès']);
    } else {
        return response()->json(['message' => 'Professeur non trouvé'], 404);
    }
}

     
}
