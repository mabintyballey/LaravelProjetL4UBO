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
    });

    // Ajouter une matière
    $('#ajouter-matiere').click(function() {
        let storeUrl = $(this).data('url'); 
        let nom = $('#matiere-nom').val(); 

        if (nom.length < 3) {
            alert('Le nom doit contenir au moins 3 caractères.');
            return;
        }

        // Envoi de la requête AJAX
        $.ajax({
            url: storeUrl,
            type: "POST",
            data: { 
                nom: nom,
                _token: $('meta[name="csrf-token"]').attr('content') 
            },
            success: function(response) {
                if (response.id && response.nom) {
                    // Si la réponse contient un id et un nom valides, ajouter la nouvelle ligne au tableau
                    let newRow = `
                        <tr id="matiere-${response.id}">
                            <td>${response.id}</td>
                            <td>${response.nom}</td>
                            <td><button class="btn btn-danger btn-sm delete-matiere" data-id="${response.id}">🗑️ Supprimer</button></td>
                        </tr>
                    `;

                    // Ajouter la nouvelle ligne au tableau
                    $('#matiere-table tbody').append(newRow);

                    // Vider le champ de saisie
                    $('#matiere-nom').val('');

                    // Mettre à jour le total des matières
                    updateTotalMatieres();

                    // Afficher un message de succès
                    $.notify({ message: 'Matière ajoutée avec succès !' }, { type: 'success', delay: 2000 });
                } else {
                    $.notify({ message: 'Erreur lors de l\'ajout de la matière !' }, { type: 'danger', delay: 2000 });
                }
            },
            error: function(xhr, status, error) {
                // Affichage d'une notification en cas d'erreur
                $.notify({ message: 'Erreur lors de l\'ajout de la matière !' }, { type: 'danger', delay: 2000 });
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
            // Supprimer la ligne du tableau
            $('#matiere-' + matiereId).remove();

            // Mettre à jour le total des matières
            updateTotalMatieres();

            // Notification de succès
            $.notify({ message: 'Matière supprimée avec succès !' }, { type: 'success', delay: 2000 });
        },
        error: function(xhr, status, error) {
            // En cas d'erreur, afficher un message d'erreur
            $.notify({ message: 'Erreur lors de la suppression de la matière !' }, { type: 'danger', delay: 2000 });
        }
    });
});

// Mettre à jour le total des matières
function updateTotalMatieres() {
    let total = $('#matiere-table tbody tr').length;
    $('#total-count').text(total);
}
</script>
@stack('scripts')
