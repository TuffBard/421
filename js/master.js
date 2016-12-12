
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
  let next = turn+1;

  //Pour chaque joueur
  for (i=1;i<=nb_joueurs;i++) {

    let $score_j = $("#score_j"+i+"_t"+turn);
    let $total_j = $("#total_j"+i);
    let total_j = parseInt($total_j.val(),10);
    let score_j = parseInt($score_j.val(),10);
    console.log(score_j);
    console.log(typeof total_j+score_j);
    //J'additionne le score au total du joueur
    $total_j.val(total_j+score_j);
    //J'empeche la modification de la ligne
    $score_j.prop("readonly", true);
  }

  //Je créer un nouvelle ligne
  let row = "<tr id='turn_"+next+"'>";
  //Je créé une collonne par joueur
  for (i=1;i<=nb_joueurs;i++) {
    row +=  "<td>"
            +"<form class='form-inline'>"
              +"<div class='form_group'>"
                +"<input type='number' id='score_j"+i+"_t"+next+"' name='score' value='1' class='form-control td_score'>"
              +"</div>"
            +"</form>"
          +"</td>";
  }
  // J'ajoute un bouton 'plus' apres la dernière colonne -->
  row += "<td id='btn_add_"+next+"'>"
          +"<button type='button' onclick='add_points("+next+");' class='btn btn-default'>"
            +"<span class='glyphicon glyphicon-plus' aria-hidden='true'></span>"
          +"</button>"
        +"</td></tr>";
  //j'ajoute la ligne au tableau
  $("#turn_"+turn).after(row);
  //Je cache le bouton précédent
  $("#btn_add_"+turn).css("display","none");
}
