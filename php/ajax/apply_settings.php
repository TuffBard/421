<?php
    session_start();
    require_once("../class/game.php");

    $players = json_decode($_POST["players"]);

    $game = new Game();
    if(isset($_SESSION["game"])){
        $game = unserialize($_SESSION["game"]);
    }
    
    for($i=1;$i<count($players);$i++)
    {
        $game->players[$i] = new Player();
        $game->players[$i]->nom = $players[$i]->name;
    }

    $_SESSION["game"] = serialize($game);
?>