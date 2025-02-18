@extends('administration.base')

@section('content')
<div class="container m-5">
    <div class="row m-5">
    <h2 class="col-md-6">Liste des Rôles</h2>
     <!-- Bouton pour ouvrir la modale d'ajout de rôle -->
     <button class="btn btn-primary col-md-4" data-bs-toggle="modal" data-bs-target="#addRoleModal">Ajouter un rôle</button>
    </div>

    <!-- Affichage des rôles -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom du Rôle</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->nom }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
     <!-- Affichage des liens de pagination -->
     <div class="d-flex justify-content-center">
        {{ $roles->links() }}
    </div>
</div>

<!-- Modale d'ajout de rôle -->
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoleModalLabel">Ajouter un nouveau rôle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('roles.store') }}" method="POST">
               @csrf
                <div class="mb-3">
                    <label for="role-name" class="form-label">Nom du rôle</label>
                    <input type="text" class="form-control" id="role-name" name="nom" required>
                </div>
                
                <!-- Affichage des erreurs de validation -->
                @if ($errors->has('nom'))
                    <div id="error-message" class="alert alert-danger">
                        {{ $errors->first('nom') }}
                    </div>
                @endif


                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>

            </div>
        </div>
    </div>
</div>
@endsection

