<?php
  session_start();
  $_SESSION["nb_j"] = $_POST["nb_joueurs"];
  echo $max = $_SESSION["nb_j"];
 ?>
