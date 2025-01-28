@extends('administration.base')


@section('content')
<div class="page-inner">
    <div
      class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
      <div>
        <h3 class="fw-bold mb-3">Liste des professeurs</h3>
      </div>
      <div class="ms-md-auto py-2 py-md-0">
        <a href="{{ route('proffesseur.create') }}" class="btn btn-primary btn-round">Ajouter un professeur</a>
      </div>
    </div>

    <div class="row card p-4">
        <div class="card-body">

            <div class="table-responsive">
              <table
                id="add-row"
                class="display table table-striped table-hover"
              >
                <thead>
                  <tr>
                    <th>Prénom et Nom</th>
                    <th>Sexe</th>
                    <th>Matricule</th>
                    <th>Adresse email</th>
                    <th style="width: 10%">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($professeurs as $professeur)
                    <tr>
                        <td>{{ $professeur->prenom }} {{ $professeur->nom }}</td>
                        <td>{{ $professeur->sexe == 'masculin' ? 'Masculin' : 'Féminin' }}</td>
                        <td>{{ $professeur->matricule }}</td>
                        <td>{{ $professeur->email }}</td>
                        <td>
                          <div class="form-button-action">
                            <button
                              type="button"
                              data-bs-toggle="tooltip"
                              title=""
                              class="btn btn-link btn-primary btn-lg"
                              data-original-title="Edit Task"
                            >
                              <i class="fa fa-edit"></i>
                            </button>
                            <button
                              type="button"
                              data-bs-toggle="tooltip"
                              title=""
                              class="btn btn-link btn-danger"
                              data-original-title="Remove"
                            >
                              <i class="fa fa-times"></i>
                            </button>
                          </div>
                        </td>
                    </tr>
                    @empty

                    @endforelse

                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection
