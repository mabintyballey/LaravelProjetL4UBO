<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Affiche tous les rôles
    public function index()
    {
        $roles = Role::paginate(5);  
        return view('administration.pages.roles.index', compact('roles'));  
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
     // Crée un nouveau rôle
     public function store(Request $request)
    {
         $request->validate([
             'nom' => 'required|string|max:255|unique:roles,nom', 
         ]);
     
         Role::create([
             'nom' => $request->nom,
         ]);
     
         return redirect()->route('roles.index');
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
