$(function() {
  initDatatable();
});

function initDatatable() {
  $("#table_games").DataTable({
    ajax: {
      url: "api.php",
      data: {
        r: "games",
        p: "getGamesByUser"
      },
      type: "GET",
      dataSrc: function(data) {
        return data;
      }
    },
    language: {
      emptyTable: "Aucune partie trouvée"
    },
    searching: false,
    paging: false,
    lengthChange: false,
    ordering: false,
    info: false,
    columns: [
      { data: "date", width: "20%" },
      { data: "nom" },
      { data: "lieu" },
      { data: "nbPlayer", width: "10%" },
      { data: "id" }
    ],
    columnDefs: [
      {
        targets: 0,
        render: function(data, type, row) {
          return moment(data.date).format("DD/MM/YY HH:mm");
        }
      },
      {
        targets: 3,
        render: function(data, type, row){
          return "<center>" + data + "</center>";
        }
      },
      {
        targets: 4,
        render: function(data, type, row){
          let template = $("#template-actions").html();
          let values = {};
          return Mustache.render(template, values);
        }
      }
    ]
  });
}
