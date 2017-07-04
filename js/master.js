function add_points() {
  let turn = $(this).data('turn');
  let nb_joueurs = $("#nb_j").val();
  let next = turn + 1;

  //Pour chaque joueur
  for (i = 1; i <= nb_joueurs; i++) {
    let $score_j = $("#score_j" + i + "_t" + turn);
    let $td_j = $("#td_j" + i + "_t" + turn);
    let $total_j = $("#total_j" + i);
    let total_j = parseFloat($total_j.val(), 10);
    let score_j = parseFloat($score_j.val(), 10);
    add_point_php(i, turn, score_j);
    //J'additionne le score au total du joueur
    $total_j.val(total_j + score_j);
    //J'empeche la modification de la ligne
    $td_j.html("<strong>"+score_j+"</strong>");
    //$score_j.prop("readonly", true);
  }

  //Je créer un nouvelle ligne
  let row = "<tr id='turn_" + next + "'>";
  //Je créé une collonne par joueur
  for (i = 1; i <= nb_joueurs; i++) {
    let diablo = gestion_diablo(i, turn);
    row += "<td id='td_j"+i+"_t"+next+"'>"
      + "<form class='form-inline'>"
      + "<div class='form_group'>"
      + "<input type='number' id='score_j" + i + "_t" + next + "' value='1' class='form-control td_score' step='0.5'>"
      + diablo
      + "</div>"
      + "</form>"
      + "</td>";
  }
  // J'ajoute un bouton 'plus' apres la dernière colonne -->
  row += "<td id='td_add_" + next + "' class='td_add'>"
    + "<button type='button' class='btn btn-primary btn-add-points' data-turn='" + next + "'>"
    + "<span class='glyphicon glyphicon-plus' aria-hidden='true'></span>"
    + "</button>"
    + "</td></tr>";
  //j'ajoute la ligne au tableau
  $("#turn_" + turn).after(row);
  //Je cache le bouton précédent
  $(this).css("display", "none");
  initBtnPoints();
  initDiablo();
  initScoreEvent();
}

function add_point_php(joueur, tour, score) {
  $.ajax({
    method: "POST",
    url: "./php/ajax/add_point.php",
    data: {
      joueur: joueur,
      tour: tour,
      score: score
    }
  }).done(function (data) {
    //console.log(data);
  });
}

function toggle_diablo() {
  //Je sélectionne l'image du joueur
  var $img = $(this);
  //Si le diablo est activé
  if ($img.attr("src") == 'img/diablo_on.png') {
    //Je passe l'img en désactivé
    $img.attr("src", "img/diablo_off.png");
  }
  else {
    //Sinon je passe l'img en activé
    $img.attr("src", "img/diablo_on.png");
  }
}

function gestion_diablo(player, turn) {
  //Je sélectionne l'image
  var $img = $("#img_diablo_j" + player + "_t" + turn);
  let next = turn + 1;
  //Si diablo activé
  if ($img.attr("src") == 'img/diablo_on.png') {
    //Je le laisse activé sur la ligne suivante
    return "<img src='img/diablo_on.png' class='diablo onclick'/>";
  }
  else {
    //Sinon je le laisse désactivé
    return "<img src='img/diablo_off.png' class='diablo onclick'/>";
  }
}

function set_nb_joueurs() {
  if (confirm("Les scores seront supprimés. Continuer ?")) {
    //Recup nb joueur
    var nb_j = $('#nb_j').val();

    //Modifie la variable de session nb_j
    $.ajax({
      method: "POST",
      url: "./php/ajax/set_nb_j.php",
      data: { nb_joueurs: nb_j }
    }).done(function () {
      //Recharge la page
      location.reload(true);
      $('#nb_j').val(nb_j);
      initDiablo();
    });
  }
}

function initBtnPoints() {
  $(".btn-add-points").unbind("click");
  $(".btn-add-points").click(add_points);
}

function initDiablo() {
  $('.diablo').unbind('click');
  $(".diablo").click(toggle_diablo);
}

function initSettings(){
  $(".set_nb_joueurs").change(set_nb_joueurs);
  $(".btn-setting-validation").click(apply_settings);
}

function initScoreEvent(){
  $(".td_score").click(function(){
    $(this).val("");
  })
}

function initSoundcloud(){
  SC.initialize({
    client_id: 'YOUR_CLIENT_ID'
  });

  var track_url = 'https://soundcloud.com/tuff-bard/sets/421-playlist';
  var sc_options = { 
    auto_play: false, 
    show_comments:false,
    //maxheight: 166
  };
  SC.oEmbed(track_url,sc_options).then(function(oEmbed) {
    //console.log('oEmbed response: ', oEmbed);
    $(".souncloud-container").html(oEmbed.html);
  });
}

function initStats(){
  $("#chart_button").click(function(){
    $.ajax({
      method: "POST",
      url: "./php/ajax/get_players.php"
    }).done(function (data) {
      var game = JSON.parse(data);
      var nb_turns = []
      for(i=1;i<=game.players[1].turns.length;i++){
        nb_turns.push(i);
      }
      
      var chart_data = {
        labels: nb_turns,
        datasets: []
      };
      //console.log(game.players);
      
      for(p in game.players){
        //console.log(game.players[p].turns);
        let total = 0
        let turns = game.players[p].turns
        turns = turns.map(function(x){
          total += x;
          return total;
        })
        let nom = game.players[p].nom

        chart_data.datasets.push({
          label: nom,
          borderColor: "black",
          data: turns,
          fill: false
        });
      }

      var ctx = document.getElementById('canvas-stats').getContext('2d');
      ctx.destroy();
      var chart = new Chart(ctx, {
          type: 'line',
          data: chart_data,
          // Configuration options go here
          options: {}
      });
    });
  });
}

function apply_settings() {
  var nbPlayers = $("#nb_j").val();
  var players = [];
  for (i = 1; i <= nbPlayers; i++) {
    players[i] = {
      id: i,
      name: $(".player_name_" + i).val()
    };
  }
  var data = JSON.stringify(players);
  $.ajax({
    method: "POST",
    url: "./php/ajax/apply_settings.php",
    data: {
      players: data
    }
  }).done(function(result){
    console.log(result);
    location.reload();
  });
}

$(function () {
  initBtnPoints();
  initDiablo();
  initSettings();
  initSoundcloud();
  initScoreEvent();
  initStats();
})
