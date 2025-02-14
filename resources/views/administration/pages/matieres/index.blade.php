@extends('administration.base')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h2 class="mb-3">Liste des matières</h2>
            <div class="alert alert-info">
                <strong>Total matières :</strong> 
                <span id="total-count" class="fw-bold fs-4">{{ count($matieres) }}</span>
            </div>
           <!-- Formulaire de recherche -->
           <div class="d-flex mt-3 mb-3">
                <form action="{{ route('matieres.index') }}" method="GET" class="d-flex w-100">
                  <!-- Champ de recherche -->
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Rechercher une matière..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> 
                        </button>
                    </div>
                </form>
           </div>
            <!-- Table des matières -->
            <table class="table table-striped" id="matiere-table">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($matieres as $matiere)
                    <tr id="matiere-{{ $matiere->id }}">
                        <td>{{ $matiere->id }}</td>
                        <td>{{ $matiere->nom }}</td>
                        <td><button class="btn btn-danger btn-sm delete-matiere" data-id="{{ $matiere->id }}">🗑️ Supprimer</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
             <!-- Pagination Links -->
             <div class="d-flex justify-content-center">
                {{ $matieres->links() }}  
            </div>
        </div>
        <div class="col-md-4">
             <h2>Ajouter une matière</h2>
             <input type="text" id="matiere-nom" class="form-control" placeholder="Nom de la matière">
            <div class="d-flex justify-content-around">
                <button class="btn btn-success mt-3" id="ajouter-matiere" data-url="{{ route('matieres.store') }}">➕ Ajouter</button>
                <button class="btn btn-secondary mt-3 mr-5 " id="annuler-ajout" type="button">❌ Annuler</button>
            </div> 
             <!-- Token CSRF -->
             <meta name="csrf-token" content="{{ csrf_token() }}">
        </div>

    </div>
</div>


@endsection