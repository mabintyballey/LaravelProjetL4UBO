@extends('welcome')
@section('title', 'Liste des etudiants')

 <!-- Lien vers le fichier CSS -->
 <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
@section('content')
<div class="h1 text-center my-5">
   Welcome | <span class="h6 text-decoration-underline">Liste des étudiants inscrit</span>
</div>


<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">N°</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Niveau</th>
            <th scope="col">Concentration</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td class="level"><span>{{ $student->level }}</span></td>
                    <td>{{ $student->concentration }}</td>
                    <td>
                        <!-- Bouton pour éditer -->
                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary btn-sm">Éditer</a>

                        <!-- Bouton pour supprimer -->
                        <a href="{{ route('student.destroy', $student->id) }}" class="btn btn-danger btn-sm">Supprimer</a>
                    </td>
                </tr>
            @endforeach
              <!-- Ligne du total -->
              <tr>
                 <td colspan="5" class="text-end"><strong>TOTAL => </strong></td>
                 <td class="text-decoration-underline">{{ $total }}</td>
             </tr>
        </tbody>
    </table>

    {{-- Liens de pagination --}}
    <div class="d-flex justify-content-start mt-4">
        {{ $students->links(('vendor.pagination.custom-pagination')) }}
    </div>

@endsection
