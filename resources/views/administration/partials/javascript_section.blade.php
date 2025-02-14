<!--   Core JS Files   -->
<script src="{{ asset('administration/assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('administration/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('administration/assets/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('administration/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('administration/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('administration/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- Kaiadmin JS -->
<script src="{{ asset('administration/assets/js/kaiadmin.min.js') }}"></script>

<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="{{ asset(path: 'administration/assets/js/setting-demo.js') }}"></script>
<script> 
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
  
$(document).ready(function() {
        // Annuler l'ajout de la matière
        $('#annuler-ajout').click(function() {
        $('#matiere-nom').val('');
        $('#classe-id').val('');
    });

    // Ajouter une matière
    $('#ajouter-matiere').click(function() {
        let storeUrl = $(this).data('url'); 
        let nom = $('#matiere-nom').val(); 
        let classe_id = $('#classe-id').val();
        if (nom.length < 3) {
            alert('Le nom doit contenir au moins 3 caractères.');
            return;
        }
        if (!nom || !classe_id) {
            alert('Veuillez remplir tous les champs');
            return;
        }
        // Envoi de la requête AJAX
        $.ajax({
            url: storeUrl,
            type: "POST",
            data: { 
                nom: nom,
                classe_id: classe_id,
                _token: $('meta[name="csrf-token"]').attr('content') 
            },
            success: function(response) {
                console.log(response);
                if (response.error) {
                        $.notify({ 
                            message: response.error
                        }, { 
                            type: 'danger', 
                            delay: 3000 
                        });
                } else if (response.matiere && response.matiere.id && response.matiere.nom) {
                    let newRow = `
                        <tr id="matiere-${response.matiere.id}">
                            <td>${response.matiere.id}</td>
                            <td>${response.matiere.nom}</td>
                            <td><button class="btn btn-danger btn-sm delete-matiere" data-id="${response.matiere.id}">🗑️ Supprimer</button></td>
                        </tr>
                    `;
            
                    $('#matiere-table tbody').append(newRow);
            
                    $('#matiere-nom').val('');
                    $('#classe-id').val('');
            
                    updateTotalMatieres();
           
                    $.notify({ message: 'Matière ajoutée avec succès !' }, { type: 'success', delay: 2000 });
                } else {
                    $.notify({ message: 'Erreur lors de l\'ajout de la matière !' }, { type: 'danger', delay: 2000 });
                }
            },
            error: function(xhr, status, error) {
                let errorMessage = 'Erreur lors de l\'ajout de la matière !';
                if (xhr.responseJSON && xhr.responseJSON.error) {
                   // Si l'erreur contient des détails, les afficher
                   errorMessage = xhr.responseJSON.error;
                } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                       errorMessage = Object.values(xhr.responseJSON.errors).join(' ');
                    }

                $.notify({ message: errorMessage }, { type: 'danger', delay: 2000 });

            }
        });
    });

    // Mettre à jour le total des matières
    function updateTotalMatieres() {
        let total = $('#matiere-table tbody tr').length;
        $('#total-count').text(total);
    }
});

// Supprimer une matière
$(document).on('click', '.delete-matiere', function() {
    let matiereId = $(this).data('id');

    $.ajax({
        url: "/matieres/" + matiereId,  
        type: "POST",
        data: {
            _method: 'DELETE',
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            $('#matiere-' + matiereId).remove();

            updateTotalMatieres();
            $.notify({ message: 'Matière supprimée avec succès !' }, { type: 'success', delay: 2000 });
        },
        error: function(xhr, status, error) {
            $.notify({ message: 'Erreur lors de la suppression de la matière !' }, { type: 'danger', delay: 2000 });
        }
    });
});

// Mettre à jour le total des matières
function updateTotalMatieres() {
    let total = $('#matiere-table tbody tr').length;
    $('#total-count').text(total);
}

// Quand un département est sélectionné
document.getElementById('departement-id').addEventListener('change', function() {
        let departementId = this.value;
        let classeSelect = document.getElementById('classe-id');
        let matiereNomInput = document.getElementById('matiere-nom');
        let ajouterMatiereButton = document.getElementById('ajouter-matiere');

        // Réinitialiser les classes
        classeSelect.innerHTML = '<option value="">Choisir une classe</option>';
        classeSelect.disabled = true;
        matiereNomInput.disabled = true;
        ajouterMatiereButton.disabled = true;

        if (departementId) {
            classeSelect.disabled = false;
            fetch(`/get-classes-by-departement/${departementId}`)
                .then(response => response.json())
                .then(data => {
                    data.classes.forEach(classe => {
                        let option = document.createElement('option');
                        option.value = classe.id;
                        option.textContent = classe.niveau;
                        classeSelect.appendChild(option);
                    });
                });
        }
    });

    document.getElementById('classe-id').addEventListener('change', function() {
        let matiereNomInput = document.getElementById('matiere-nom');
        let ajouterMatiereButton = document.getElementById('ajouter-matiere');

        if (this.value) {
            matiereNomInput.disabled = false;
            ajouterMatiereButton.disabled = false;
        } else {
            matiereNomInput.disabled = true;
            ajouterMatiereButton.disabled = true;
        }
    });
</script>
@stack('scripts')
