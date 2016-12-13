<!DOCTYPE html>
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
            <input class="form-control td_score" type="text" id="nb_j" value="2" width="15">
        </center>
      </div>
        <div class="col-md-8">
          <h1><center>421</center></h1>

          <table class="table table_score">
            <!-- Liste des joueurs -->
            <thead>
              <tr>
                <?php
                  $max=2;
                  for($i=1;$i<=$max;$i++){
                    echo "<th id='th_j$i'>
                            <form class='form-inline'>
                              <div class='form_group'>
                                <input type='text' class='form-control' id='j$i' placeholder='Joueur $i'>
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
