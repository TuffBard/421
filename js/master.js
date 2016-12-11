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
