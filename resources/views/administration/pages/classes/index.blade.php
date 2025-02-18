@extends('administration.base')

@section('content')
<div class="container mt-5">
    <!-- Sélecteur du département -->
    <div class="row mb-4">
        <div class="col-md-6">
            <select id="departement-selector" class="form-control">
                <option value="">Sélectionner un département</option>
                @foreach($departements as $departement)
                    <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 text-right">
           <button id="show-classes-btn" class="btn btn-primary">Afficher ses Classes</button>
        </div>
        <div class="col-md-3 text-right">
           <button id="add-class-btn" class="btn btn-success" data-toggle="modal" data-target="#addClassModal">Ajouter une Classe</button>
        </div>
    </div>

    <!-- Section affichage du département et des classes -->
    <div id="classe-container" class="row">
        <div class="col-md-8">
            <!-- Label pour afficher le nom du département -->
            <h3 id="departement-name" style="display:none;"></h3>

            <!-- Tableau des classes -->
            <table id="classe-table" class="table table-bordered" style="display:none;">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nom de la Classe</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Les classes seront chargées ici via AJAX -->
                </tbody>
            </table>
        </div>

        <!-- Section pour afficher les matières d'une classe -->
        <div id="matiere-container" class="col-md-4 mt-5">
            <!-- Card pour afficher les matières de la classe -->
            <div class="card" style="display:none;">
                <div class="card-header">
                    <h5 id="classe-nom"></h5>
                </div>
                <div class="card-body">
                    <ul id="matiere-list">
                        <!-- Liste des matières sera chargée ici -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour ajouter une classe -->
<!-- Modal -->
<div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-labelledby="addClassModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClassModalLabel">Ajouter une Classe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addClassForm">
                    <!-- Token CSRF -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <select id="departement-selector" class="form-control" name="departement" required>
                            <option value="">Choisir un département</option>
                            @foreach($departements as $departement)
                                <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="classe-nom">Nom de la Classe</label>
                        <input type="text" class="form-control" id="classe-nom" name="nom" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
