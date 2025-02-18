<!-- Modal for adding a new class -->
<div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-labelledby="addClassModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClassModalLabel">Ajouter une classe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addClassForm">
                    <div class="form-group">
                        <label for="classe-nom">Nom de la classe</label>
                        <input type="text" class="form-control" id="classe-nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="departement-id">Département</label>
                        <select class="form-control" id="departement-id" name="departement_id" required>
                            <option value="">Sélectionner un département</option>
                            <!-- Dynamically load departments -->
                            @foreach($departements as $departement)
                                <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>
