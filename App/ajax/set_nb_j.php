<?php
  session_start();
  require_once("../class/game.php");

  $game = new Game();
  if(isset($_SESSION["game"])){
    $game = unserialize($_SESSION["game"]);
  }
  $game->setPlayers($_POST["nb_joueurs"]);
  for ($i=1; $i < $game->nb_player; $i++) {
    $game->players[$i] = new Player();
  }
  $_SESSION["game"] = serialize($game);
 ?>
