<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matiere extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function professeurs() {
        return $this->belongsToMany(User::class);
    }
}
