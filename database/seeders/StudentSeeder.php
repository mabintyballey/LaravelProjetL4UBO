<?php

namespace Database\Seeders;

use App\Models\Student as ModelsStudent;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crée 20 utilisateurs
        ModelsStudent::factory(20)->create();
    }
}
