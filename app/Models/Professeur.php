<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;

    // Vous pouvez définir des propriétés comme les champs remplissables (fillable)
    protected $fillable = ['prenom', 'nom', 'email', 'matricule', 'genre'];
}
