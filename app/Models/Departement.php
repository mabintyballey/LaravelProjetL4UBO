<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    // Si le nom de la table est "departements", Laravel se charge de la table par défaut.
    protected $table = 'departements';

    // Définir les champs qui peuvent être assignés en masse (mass assignment)
    protected $fillable = ['nom']; // Exemple: 'nom' correspond au nom du département

   
}
