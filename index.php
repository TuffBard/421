<!DOCTYPE html>
<?php
  session_start();
  require_once("php/class/game.php");

  $game = new Game();
  if(isset($_SESSION["game"])){
    $game = unserialize($_SESSION["game"]);
  }
  $max = $game->nb_player;
  $_SESSION["game"] = serialize($game);
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>421</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS -->
    <link href="css/master.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery-3.1.0.min.js" charset="utf-8"></script>
    <!-- JS -->
    <script src="js/master.js"></script>
  </head>
  <body>

    <div class="container">
      <div class="col-md-2">
        <center>
          <label>Nombre de Joueur</label>

          <div class='form_group'>
              <!-- <input class="form-control td_score" type="text" id="nb_j" value="<?php echo $max ?>" width="15" onsubmit="set_nb_j();">
              <button type="button" onclick="set_nb_j();" class="btn btn-default">
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
              </button> -->
            <div class="col-xs-8 col-xs-offset-2">
              <select id='nb_j' class='form-control' onchange="set_nb_joueurs();">
                <?php
                for ($i=2; $i <= 8; $i++)
                {
                  if($i==$max){
                    echo "<option value='$i' selected>$i</option>";
                  }else {
                    echo "<option value='$i'>$i</option>";
                  }
                }
                ?>
                </select>
            </div>
        </div>

        </center>
      </div>
        <div class="col-md-8">
          <h1><center>421</center></h1>

          <table class="table table_score">
            <!-- Liste des joueurs -->
            <thead>
              <tr>
                <?php
                  for($i=1;$i<=$max;$i++){
                    if(isset($game->players[$i]->nom)){
                      $nom = $game->players[$i]->nom;
                      $disabled = "disabled";
                      $onclick = "modNom($i);";
                    } else {
                      $nom = "";
                      $disabled = "";
                      $onclick = "setNom($i);";
                    }
                    echo "<th id='th_j$i'>
                            <form class='form-inline'>
                              <div class='form_group'>
                                <input type='text' class='form-control input_name' id='j$i' placeholder='Joueur $i' value='$nom' $disabled>
                                <button id='btn_nom$i' type='button' onclick='$onclick' class='btn btn-default btn-sm'>
                                  <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
                                </button>
                              </div>
                            </form>
                          </th>";
                  }
                ?>
              </tr>
            </thead>
            <!-- Score total -->
            <tr>
              <?php
              for($i=1;$i<=$max;$i++)
              {
                $game->players[$i]->refresh_total();
                if( isset($game->players[$i]->total) ){
                  $total = $game->players[$i]->total;
                } else {
                  $total = 0;
                }
                echo"<td>
                  <form class='form-inline'>
                    <div class='form_group'>
                      <input type='number' id='total_j$i' name='score' value='$total' class='form-control td_score' step='0.5' readonly>
                    </div>
                  </form>
                </td>";
              }
              ?>
            </tr>
              <?php
              /// Scores précédents
              $nb_turns = count($game->players[1]->turns);
              for($t=0;$t<$nb_turns;$t++){
                echo "<tr id='turn_$t'>";
                for($i=1;$i<=$max;$i++){
                  $score = $game->players[$i]->turns[$t];
                  echo"<td>
                        <form class='form-inline'>
                          <div class='form_group'>
                            <input type='number' id='score_j".$i."_t$t' name='score' value='$score' class='form-control td_score' step='0.5' disabled>
                            <img id='img_diablo_j".$i."_t$t' src='img/diablo_off.png' alt='diablo is off' value='false' onclick='toggle_diablo($i,$t);' class='onclick'/>
                          </div>
                        </form>
                      </td>";
                }
                echo "</tr>";
              }
            /// Premiere ligne de score
            echo "<tr id='turn_$nb_turns'>";

              //Je créé une colonne par joueur
              for($i=1;$i<=$max;$i++){
                echo"<td>
                      <form class='form-inline'>
                        <div class='form_group'>
                          <input type='number' id='score_j".$i."_t$nb_turns' name='score' value='1' class='form-control td_score' step='0.5'>
                          <img id='img_diablo_j".$i."_t$nb_turns' src='img/diablo_off.png' alt='diablo is off' value='false' onclick='toggle_diablo($i,$nb_turns);' class='onclick'/>
                        </div>
                      </form>
                    </td>";
              }

              // J'ajoute un bouton 'plus' apres la dernière colonne
              echo"<td id='btn_add_$nb_turns'>
                <button type='button' onclick='add_points($nb_turns);' class='btn btn-default'>
                  <span class='glyphicon glyphicon-plus' aria-hidden='true'></span>
                </button>
              </td>";
              ?>
            </tr>
          </table>
        </div>
        <div class="col-md-2">
            <center><a href="rules.html" target="_blank"><button type="button" class="btn btn-default btn_regle">Règles</button></a></center>
        </div>
    </div>

  </body>
</html>
