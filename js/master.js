
function setNom(id){
  let $nom = $('#j'+id)
  if($nom.val().trim()!=""){
    $nom.prop('disabled',true)
    $("#btn_nom"+id).attr("onclick","modNom("+id+")")
  }
}

function modNom(id){
  $("#j"+id).prop('disabled',false)
  $("#btn_nom"+id).attr("onclick","setNom("+id+")")
}

function add_points(turn) {
  let nb_joueurs = $("#nb_j").val();
  for (i=1;i<=nb_joueurs;i++) {
    let total_j = parseInt($("#total_j"+i).val(),10);
    let score_j = parseInt($("#score_j"+i+"_t"+turn).val(),10);
    $("#total_j"+i).val(total_j+score_j);
  }
}
