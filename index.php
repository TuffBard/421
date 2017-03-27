<!DOCTYPE html>
<?php
  session_start();
  if(!isset($_SESSION["nb_j"])) {
    $_SESSION["nb_j"] = 2;
  }
  $max = $_SESSION["nb_j"];
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
            <div class="col-xs-8 col-xs-offset-2" onchange="set_nb_joueurs();">
              <select id="nb_j" class="form-control">
                <?php
                for ($i=2; $i <= 6; $i++) {
                  echo "<option value='$i'>$i</option>";
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
                    echo "<th id='th_j$i'>
                            <form class='form-inline'>
                              <div class='form_group'>
                                <input type='text' class='form-control input_name' id='j$i' placeholder='Joueur $i'>
                                <button id='btn_nom$i' type='button' onclick='setNom($i);' class='btn btn-default'>
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
                echo"<td>
                  <form class='form-inline'>
                    <div class='form_group'>
                      <input type='number' id='total_j$i' name='score' value='0' class='form-control td_score' step='0.5' readonly>
                    </div>
                  </form>
                </td>";
              }
              ?>
            </tr>

            <!-- Premiere ligne de score -->
            <tr id="turn_0">
              <?php
              //Je créé une colonne par joueur
              for($i=1;$i<=$max;$i++){
                echo"<td>
                      <form class='form-inline'>
                        <div class='form_group'>
                          <input type='number' id='score_j".$i."_t0' name='score' value='1' class='form-control td_score' step='0.5'>
                          <img id='img_diablo_j".$i."_t0' src='img/diablo_off.png' alt='diablo is off' value='false' onclick='toggle_diablo($i,0);' class='onclick'/>
                        </div>
                      </form>
                    </td>";
              }
              ?>
              <!-- J'ajoute un bouton 'plus' apres la dernière colonne -->
              <td id="btn_add_0">
                <button type='button' onclick='add_points(0);' class='btn btn-default'>
                  <span class='glyphicon glyphicon-plus' aria-hidden='true'></span>
                </button>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-md-2">
            <center><a href="rules.html" target="_blank"><button type="button" class="btn btn-default btn_regle">Règles</button></a></center>
        </div>
    </div>

  </body>
</html>
