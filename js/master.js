
function setNom(){
  let id = $(this).data("id");
  let $nom = $('#j'+id)
  if($nom.val().trim()!=""){
    $nom.prop('disabled',true)
    $(this).addClass("btn_mod_nom");
    $(this).removeClass("btn_set_nom");
    initBtnName();

    $.ajax({
      method: "POST",
      url:"./php/ajax/modify_name.php",
      data: {
        joueur: id,
        nom: $nom.val()
      }
    }).fail(function(s,x,e){
      alert("Erreur !");
      console.log(e);
    });
  } else {
    alert("Vous devez entrer un nom !");
  }
}

function modNom(){
  let id = $(this).data("id");
  $("#j"+id).prop('disabled',false)
  $(this).removeClass("btn_mod_nom");
  $(this).addClass("btn_set_nom");
  initBtnName();
}

function add_points() {
  let turn = $(this).data('turn');
  let nb_joueurs = $("#nb_j").val();
  let next = turn+1;

  //Pour chaque joueur
  for (i=1;i<=nb_joueurs;i++)
  {
    let $score_j = $("#score_j"+i+"_t"+turn);
    let $total_j = $("#total_j"+i);
    let total_j = parseFloat($total_j.val(),10);
    let score_j = parseFloat($score_j.val(),10);
    add_point_php(i,turn,score_j);
    //J'additionne le score au total du joueur
    $total_j.val(total_j+score_j);
    //J'empeche la modification de la ligne
    $score_j.prop("readonly", true);
  }

  //Je créer un nouvelle ligne
  let row = "<tr id='turn_"+next+"'>";
  //Je créé une collonne par joueur
  for (i=1;i<=nb_joueurs;i++) {
    let diablo = gestion_diablo(i,turn);
    row +=  "<td>"
            +"<form class='form-inline'>"
              +"<div class='form_group'>"
                +"<input type='number' id='score_j"+i+"_t"+next+"' value='1' class='form-control td_score' step='0.5'>"
                + diablo
              +"</div>"
            +"</form>"
          +"</td>";
  }
  // J'ajoute un bouton 'plus' apres la dernière colonne -->
  row += "<td id='btn_add_"+next+"'>"
          +"<button type='button' class='btn btn-default btn-add-points' data-turn='"+next+"'>"
            +"<span class='glyphicon glyphicon-plus' aria-hidden='true'></span>"
          +"</button>"
        +"</td></tr>";
  //j'ajoute la ligne au tableau
  $("#turn_"+turn).after(row);
  //Je cache le bouton précédent
  $("#btn_add_"+turn).css("display","none");
  initBtnPoints();
  initDiablo();
}

function add_point_php(joueur, tour, score){
  $.ajax({
    method: "POST",
    url:"./php/ajax/add_point.php",
    data: {
      joueur: joueur,
      tour: tour,
      score: score
    }
  }).done(function(data){
    console.log(data);
  });
}

function toggle_diablo(){
  //Je sélectionne l'image du joueur
  var $img = $(this);
  //Si le diablo est activé
  if($img.attr("src")=='img/diablo_on.png'){
    //Je passe l'img en désactivé
    $img.attr("src","img/diablo_off.png");
  }
  else {
    //Sinon je passe l'img en activé
    $img.attr("src","img/diablo_on.png");
  }
}

function gestion_diablo(player, turn){
  //Je sélectionne l'image
  var $img = $("#img_diablo_j"+player+"_t"+turn);
  let next = turn+1;
  //Si diablo activé
  if($img.attr("src")=='img/diablo_on.png'){
    //Je le laisse activé sur la ligne suivante
    return "<img src='img/diablo_on.png' class='diablo onclick'/>";
  }
  else {
    //Sinon je le laisse désactivé
    return "<img src='img/diablo_off.png' class='diablo onclick'/>";
  }
}

function set_nb_joueurs() {
    if(confirm("Les scores seront supprimés. Continuer ?")){
      //Recup nb joueur
      var nb_j = $('#nb_j').val();

      //Modifie la variable de session nb_j
      $.ajax({
        method: "POST",
        url:"./php/ajax/set_nb_j.php",
        data: {nb_joueurs: nb_j}
      }).done(function(){
        //Recharge la page
        location.reload(true);
        $('#nb_j').val(nb_j);
      });
    }
}

function initBtnName(){
  $(".btn_set_nom").unbind("click");
  $(".btn_mod_nom").unbind("click");
  $(".btn_set_nom").click(setNom);
  $(".btn_mod_nom").click(modNom);
}

function initBtnPoints(){
  $(".btn-add-points").click(add_points);
}

function initDiablo(){
  $(".diablo").click(toggle_diablo);
}

$(function(){
$(".set_nb_joueurs").change(set_nb_joueurs);

  $('.input_name').keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      $(this).next().click();
      return false;
    }
  });

  initBtnName();
  initBtnPoints();
  initDiablo();
})
