<?php

use App\Http\Controllers\ProffesseurController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


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

Route::get('/', function () {
    return view('welcome');
})->name('acceuil');

Route::view('base/','base');
Route::get('/students-list', [StudentController::class, 'index'])->name('student.index');
Route::get('/add-student', [StudentController::class, 'create'])->name('student.create');
Route::post('/add-student', [StudentController::class, 'store'])->name('student.store');
Route::get('/update-student/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/update-student/{id}', [StudentController::class, 'update'])->name('student.update');
Route::get('/delete-student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');


// Administration app
Route::view('admin/', 'administration/pages/dashboard');
Route::get('admin/liste-professeurs/', [ProffesseurController::class, 'index'])->name('proffesseur.list');
Route::get('admin/ajouter-un-professeur/', [ProffesseurController::class, 'create'])->name('proffesseur.create');
Route::post('admin/ajouter-un-professeur/', [ProffesseurController::class, 'store'])->name('proffesseur.store');
