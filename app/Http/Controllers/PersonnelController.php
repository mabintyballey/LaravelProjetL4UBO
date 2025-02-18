<?php



namespace App\Http\Controllers;

use App\Models\Personnel; // Remplacer Professeur par Personnel
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    // Méthode pour afficher la liste du personnel
    public function index()
    {
        $personnel = Personnel::all(); // Récupérer tous les membres du personnel
        return view('administration.pages.personnel-list', compact('personnel'));
    }

    
}

 