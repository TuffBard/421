$(document).ready(function () {
    var french = {
        emptyTable: "Aucune partie trouvée.",
        loadingRecords: "Chargement en cours..",
        info: "De _START_ a _END_ sur _TOTAL_ résultats",
        paginate: {
            previous: "précédent",
            next: "suivant",
        }
    }

    $('#ListPlayerTable').DataTable({
        scrollY: false,
        searching: false,
        language: french,
        lengthChange: false,
        info: false,
        ajax:{
            url: "",
            type: "post",
            data: {
                userId: ""
            }
        }
    });
});