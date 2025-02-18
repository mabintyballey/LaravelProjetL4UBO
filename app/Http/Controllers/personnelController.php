<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class personnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$professeurs = User::where('role_id', '=', 1)->get();

        $personnels = User::whereHas('role', function ($query) {
            $query->where('nom', 'personnel');
        })->get();

        return view('administration.pages.personnel-index', [
            'personnels' => $personnels
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('administration.pages.personnel-create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roleId = Role::where('nom', 'personnel')->first()->id;
        $personnel = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'age' => $request->age,
            'email' => $request->email,
            'matricule' => $this->generateMatricule(),
            'genre' => $request->genre,
            'password' => Hash::make('password'),
            'role_id' => $roleId, 
        ]);
    
        $personnel->save();
    
        return redirect()->route('personnel.list');
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
