<?php
  session_start();
  require_once("../class/game.php");

  $game = new Game();

  $game->nb_player = $_POST["nb_joueurs"];
  $_SESSION["game"] = serialize($game);
 ?>
