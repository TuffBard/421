<?php
session_start();
require_once("../class/game.php");

$game = new Game();
if(isset($_SESSION["game"])){
  $game = unserialize($_SESSION["game"]);
}

echo json_encode($game);
?>