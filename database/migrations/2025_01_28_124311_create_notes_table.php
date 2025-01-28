<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->decimal('note_1', 4);
            $table->decimal('note_2', 4);
            $table->decimal('note_3', 4);
            $table->unsignedBigInteger('matiere_id');
            $table->unsignedBigInteger('etudiant_id');
            $table->timestamps();

            $table->foreign('matiere_id')->references('id')->on('matieres');
            $table->foreign('etudiant_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
