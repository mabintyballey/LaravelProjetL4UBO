@extends('welcome')
@section('title', 'Creation')

 <!-- Lien vers le fichier CSS -->
 <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

@section('content')
<div class="h3 text-center mt-3">
    Ajouter un étudiant
 </div>
<form action="{{ route('student.store') }}" method="POST" class="p-2 ">
    @csrf 
    <!-- Champ Prénom -->
    <div class="mb-3">
        <label for="first_name" class="form-label">Prénom</label>
        <input
            type="text"
            id="first_name"
            name="first_name"
            class="form-control"
            value="{{ old('first_name') }}"
            required>
        @error('first_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Champ Nom -->
    <div class="mb-3">
        <label for="last_name" class="form-label">Nom</label>
        <input
            type="text"
            id="last_name"
            name="last_name"
            class="form-control"
            value="{{ old('last_name') }}"
            required>
        @error('last_name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Champ Niveau -->
    <div class="mb-3">
        <label for="level" class="form-label">Niveau</label>
        <input
            type="text"
            id="level"
            name="level"
            class="form-control"
            value="{{ old('level') }}"
            required>
        @error('level')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Champ Concentration -->
    <div class="mb-3">
        <label for="concentration" class="form-label">Concentration</label>
        <input
            type="text"
            id="concentration"
            name="concentration"
            class="form-control"
            value="{{ old('concentration') }}"
            required>
        @error('concentration')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Boutons -->
    <div class="d-flex justify-content-between mt-4">
        <!-- Bouton Ajouter l'étudiant -->
        <button type="submit" class="btn btn-primary">Enregistrer</button>
         <!-- Bouton Revenir à la liste -->
         <a href="{{ route('student.index') }}" class="btn colore">Retour à la liste</a>

    </div>
</form>

@endsection
