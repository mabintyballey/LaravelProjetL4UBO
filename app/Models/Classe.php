<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    public function departement() {
        return $this->belongsTo(Departement::class);  
    }
    public function matieres() {
        return $this->hasMany(Matiere::class);
    }

}
