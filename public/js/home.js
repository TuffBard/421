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
            url: "php/ajax/get_games.php",
            type: "POST",
            data: {
                userId: $("#userId").val()
            },
            dataSrc:""
        },
        columns:[
            { data: "Name" },
            { data: "NbPlayer" },
            { data: "NbTurn" },
            { data: "Name" }
        ],
        columnDefs:[
            {
                targets: 3,
                render: function(data, type, row){
                    return "<div class='btn btn-default'>Ouvrir</div>";
                }
            }
        ]
    });
});