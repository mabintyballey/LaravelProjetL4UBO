<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

 // Liste des étudiants
 public function index()
{
    $students = Student::paginate(7);
    // Nombre total d'etudiants enregistrer
    $total = Student::count();
    return view('student.index', compact('students', 'total'));
}

  // Méthode pour afficher le formulaire de création
    public function create()
    {
        return view('student.create');
    }


 // Méthode pour enregistrer un nouvel étudiant
       public function store(Request $request)
       {
           // Validation des données
           $request->validate([
               'first_name' => 'required|string|max:255',
               'last_name' => 'required|string|max:255',
               'level' => 'required|string|max:255',
               'concentration' => 'required|string|max:255',
           ]);
           
         // Créer un nouvel étudiant dans la base de données
           Student::create($request->all());
           return redirect('/students-list');
       }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


// Formulaire d'édition
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }


// Methode pour modifier les infos d'un etudiant

    public function update(Request $request, $id)
    {
        // Valider les données
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'concentration' => 'required|string|max:255',
        ]);

        // Trouver l'étudiant et mettre à jour ses informations
        $student = Student::findOrFail($id);
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->level = $request->level;
        $student->concentration = $request->concentration;
        $student->save();

        // Rediriger avec un message de succès
        return redirect('/students-list');

    }
//Methode pour supprimer un étudiant
     public function destroy($id)
     {
         $student = Student::findOrFail($id);
         $student->delete();
         return redirect('/students-list');
     }
}
