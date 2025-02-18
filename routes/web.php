<?php

use App\Http\Controllers\ProffesseurController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\PersonnelController;

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
Route::get('admin/liste-professeurs/', [ProffesseurController::class, 'index'])->name('proffesseur.list');
Route::get('admin/ajouter-un-professeur/', [ProffesseurController::class, 'create'])->name('proffesseur.create');
Route::post('admin/ajouter-un-professeur/', [ProffesseurController::class, 'store'])->name('proffesseur.store');
Route::get('/professeur/{professeur}', [ProffesseurController::class, 'show'])->name('professeur.show');
Route::delete('/professeur/{professeur}', [ProffesseurController::class, 'destroy'])->name('professeur.destroy');
Route::get('/professeur/{professeur}/edit', [ProffesseurController::class, 'edit'])->name('professeur.edit');




// Etudiants
Route::get('/students-list', [StudentController::class, 'index'])->name('student.index');
Route::get('/add-student', [StudentController::class, 'create'])->name('student.create');
Route::post('/add-student', [StudentController::class, 'store'])->name('student.store');
Route::get('/update-student/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/update-student/{id}', [StudentController::class, 'update'])->name('student.update');
Route::get('/delete-student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

//Departements
Route::get('/departements', [DepartementController::class, 'index'])->name('departement.index');
Route::post('/departements', [DepartementController::class, 'store'])->name('departement.store');
Route::delete('/departements/{id}', [DepartementController::class, 'destroy']);

//Personnel
// Route pour afficher la liste du personnel
Route::get('/personnel', [PersonnelController::class, 'index'])->name('personnel.list');

// Route pour afficher le formulaire de création du personnel
Route::get('/personnel/create', [PersonnelController::class, 'create'])->name('personnel.create');

// Route pour enregistrer un nouveau personnel
Route::post('/personnel', [PersonnelController::class, 'store'])->name('personnel.store');

// Route pour afficher le formulaire de modification du personnel
Route::get('/personnel/{id}/edit', [PersonnelController::class, 'edit'])->name('personnel.edit');

// Route pour supprimer un membre du personnel
Route::delete('/personnel/{id}', [PersonnelController::class, 'destroy'])->name('personnel.destroy');





require __DIR__.'/auth.php';
