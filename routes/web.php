<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\ProffesseurController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\etudiantControler;
use App\Http\Controllers\personnelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home page
Route::get('/', function () {
    return view('home');
})->name('acceuil');

Route::view('base/','base');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//--- Administration app

// Route::get('/admin/login', function () {
//     return view('administration.pages.login');
// })->name('admin.login');

// Route::get('/admin/register', function () {
//     return view('administration.pages.register');
// })->name('admin.register');

// Dashboard
Route::view('admin/', 'administration/pages/dashboard')->name('administration.dashboard');

// Professeurs
Route::get('admin/liste-professeurs/', [ProffesseurController::class, 'index'])->name('professeur.list');
Route::get('admin/ajouter-un-professeur/', [ProffesseurController::class, 'create'])->name('professeur.create');
Route::post('admin/ajouter-un-professeur/', [ProffesseurController::class, 'store'])->name('professeur.store');

// Etudiants
Route::get('admin/liste-etudiant/', [etudiantControler::class, 'index'])->name('etudiant.list');
Route::get('admin/ajouter-un-etudiant/', [etudiantControler::class, 'create'])->name('etudiant.create');
Route::post('admin/ajouter-un-etudiant/', [etudiantControler::class, 'store'])->name('etudiant.store');
// Etudiants
Route::get('admin/liste-personnel/', [personnelController::class, 'index'])->name('personnel.list');
Route::get('admin/ajouter-un-personnel/', [personnelController::class, 'create'])->name('personnel.create');
Route::post('admin/ajouter-un-personnel/', [personnelController::class, 'store'])->name('personnel.store');
// Students 1 projet
Route::get('/students-list', [StudentController::class, 'index'])->name('student.index');
Route::get('/add-student', [StudentController::class, 'create'])->name('student.create');
Route::post('/add-student', [StudentController::class, 'store'])->name('student.store');
Route::get('/update-student/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/update-student/{id}', [StudentController::class, 'update'])->name('student.update');
Route::get('/delete-student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
// matieres
Route::get('/matieres-list', [MatiereController::class, 'index'])->name('matieres.index');
Route::get('/add-matiere', [MatiereController::class, 'create'])->name('matieres.create');
Route::post('/matieres', [MatiereController::class, 'store'])->name('matieres.store');
Route::get('/get-classes-by-departement/{departementId}', [MatiereController::class, 'getClassesByDepartement']);
Route::delete('/matieres/{matiere}', [MatiereController::class, 'destroy'])->name('matieres.destroy');
require __DIR__.'/auth.php';
//classes
Route::get('classe-list', [ClasseController::class, 'index'])->name('classes.index');
Route::post('/add-classe', [ClasseController::class, 'store'])->name('classes.store');
Route::get('/classe/{id}/matieres', [ClasseController::class, 'getMatieres']);
Route::get('/departement/{id}/classes', [DepartementController::class, 'getClasses']);
Route::delete('/classes/{classe}', [ClasseController::class, 'destroy'])->name('delete-classe');
Route::get('/departement/{departementId}/classes', [ClasseController::class, 'getClassesByDepartement']);
// roles
Route::get('/roles-list', [RoleController::class, 'index'])->name('roles.index');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');