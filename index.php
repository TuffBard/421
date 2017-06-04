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
    <nav class="navbar navbar-default">
      <div class="container-fluid">

        <div class="navbar-header">
          <a class="navbar-brand" href="#"><strong>421</strong></a>
        </div>

        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a><label>Nombre de Joueur</label></a></li>
          </ul>
          <form class="navbar-form navbar-left">
            <select id='nb_j' class='form-control set_nb_joueurs'>
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
          </form>
          <form class="navbar-form navbar-right">
            <a href="rules.html" target="_blank" class="btn btn-primary float-right">Règles</a>
          </form>
        </div>

      </div>
    </nav>
    <div class="container-fluid">
      <div class="col-md-12">
        <table class="table table_score">
          <!-- Liste des joueurs -->
          <thead>
            <tr>
              <?php
                for($i=1;$i<=$max;$i++){
                  if(isset($game->players[$i]->nom)){
                    $nom = $game->players[$i]->nom;
                    $disabled = "disabled";
                    $onclick = "btn_mod_nom";
                  } else {
                    $nom = "";
                    $disabled = "";
                    $onclick = "btn_set_nom";
                  }
                  echo "<th>
                          <form class='form-inline'>
                            <div class='form_group'>
                              <input type='text' class='form-control input_name' id='j$i' placeholder='Joueur $i' value='$nom' $disabled>
                              <button type='button' class='btn btn-default btn-l $onclick' data-id='$i'>
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
                          <img src='img/diablo_off.png' value='false' class='diablo onclick'/>
                        </div>
                      </form>
                    </td>";
              }
              echo "</tr>";
            }
          /// Nouveau tour
          echo "<tr id='turn_$nb_turns'>";

            //Je créé une colonne par joueur
            for($i=1;$i<=$max;$i++){
              echo"<td>
                    <form class='form-inline'>
                      <div class='form_group'>
                        <input type='number' id='score_j".$i."_t$nb_turns' name='score' value='1' class='form-control td_score' step='0.5'>
                        <img src='img/diablo_off.png' value='false' class='diablo onclick'/>
                      </div>
                    </form>
                  </td>";
            }

            // J'ajoute un bouton 'plus' apres la dernière colonne
            echo"<td id='btn_add_$nb_turns' class='td_add'>
              <button type='button' class='btn btn-primary btn-add-points' data-turn='$nb_turns'>
                <span class='glyphicon glyphicon-plus' aria-hidden='true'></span>
              </button>
            </td>";
            ?>
          </tr>
        </table>
      </div>
    </div>

  </body>
</html>
