<?php
session_start();
require_once("../class/game.php");

$game = new Game();
if(isset($_SESSION["game"])){
  $game = unserialize($_SESSION["game"]);
}
$joueur = intval($_POST["joueur"]);
$tour = intval($_POST["tour"]);
$score = floatval($_POST["score"]);

//echo var_dump($_SESSION["game"]);

$game->players[$joueur]->turns[$tour] = $score;
$_SESSION["game"] = serialize($game);
echo "joueur: $joueur\n";
echo "tour: $tour\n";
echo "score: $score\n";
echo "player: ".$game->players[$joueur]->turns[$tour]."\n";
echo var_dump($game);
 ?>
