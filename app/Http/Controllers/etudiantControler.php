<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class etudiantControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$professeurs = User::where('role_id', '=', 1)->get();

        $etudiants = User::whereHas('role', function ($query) {
            $query->where('nom', 'etudiant');
        })->get();

        return view('administration.pages.etudiant-index', [
            'etudiants' => $etudiants
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('administration.pages.etudiant-create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roleId = Role::where('nom', 'etudiant')->first()->id;
        $etudiant = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'age' => $request->age,
            'email' => $request->email,
            'matricule' => $this->generateMatricule(),
            'genre' => $request->genre,
            'password' => Hash::make('password'),
            'role_id' => $roleId, 
        ]);
    
        $etudiant->save();
    
        return redirect()->route('etudiant.list');
    }
    

    public function generateMatricule() {
        return 'M00' . time();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
