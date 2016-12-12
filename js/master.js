var nb_joueurs = $("nb_j").val();

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
  alert("bitch!");
  for (i=1;i<=nb_joueurs;i++) {
    $("total_j"+i).val(this.val()+$("score_j"+i+"_t"+turn).val());
  }
}
