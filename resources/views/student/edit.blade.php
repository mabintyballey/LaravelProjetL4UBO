@extends('base')
@section('titre', 'Modification')

@section('contenu')
<div class="h3 text-center mt-3">
    Modifier les infos d'un étudiant
 </div>
<form action="{{ route('student.update', $student->id) }}" method="POST" class="p-2 ">
    @csrf
    @method('POST')
    <div class="mb-3">
        <label for="first_name" class="form-label">Prénom</label>
        <input
            type="text"
            id="first_name"
            name="first_name"
            class="form-control"
            value="{{ $student->first_name }}"
            required>
    </div>

    <div class="mb-3">
        <label for="last_name" class="form-label">Nom</label>
        <input
            type="text"
            id="last_name"
            name="last_name"
            class="form-control"
            value="{{ $student->last_name }}"
            required>
    </div>

    <div class="mb-3">
        <label for="level" class="form-label">Niveau</label>
        <input
            type="text"
            id="level"
            name="level"
            class="form-control"
            value="{{ $student->level }}"
            required>
    </div>

    <div class="mb-3">
        <label for="concentration" class="form-label">Concentration</label>
        <input
            type="text"
            id="concentration"
            name="concentration"
            class="form-control"
            value="{{ $student->concentration }}"
            required>
    </div>

    <div class="d-flex justify-content-between mt-4">
        <!-- Bouton "Mettre à jour" -->
        <button type="submit" class="btn btn-primary">Enregistrer</button>
         <!-- Bouton "Revenir à la liste" -->
        <a href="{{ route('student.index') }}" class="btn colore">Retour à la liste</a>
    </div>
</form>

@endsection

