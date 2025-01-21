<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
     // Les champs qui peuvent être remplis par l'attribution de masse
     protected $fillable = [
        'first_name',
        'last_name',
        'level',
        'concentration'
    ];
}
