<?php
  session_start();
  require_once("../class/game.php");

  $game = new Game();
  if(isset($_SESSION["game"])){
    $game = unserialize($_SESSION["game"]);
  }

  $game->players[$_POST["joueur"]]->nom = $_POST["nom"];
  $_SESSION["game"] = serialize($game);
 ?>
