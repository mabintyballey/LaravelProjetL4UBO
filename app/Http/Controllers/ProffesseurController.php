<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $roleId = Role::where('nom', 'professeur')->first()->id;
        $professeur = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'age' => $request->age,
            'email' => $request->email,
            'matricule' => $this->generateMatricule(),
            'genre' => $request->genre,
            'password' => Hash::make('password'),
            'role_id' => $roleId, 
        ]);
    
        $professeur->save();
    
        return redirect()->route('professeur.list');
    }
    

    public function generateMatricule() {
        return 'M00' . time();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
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
    public function destroy(User $user)
    {
        //
    }
}
