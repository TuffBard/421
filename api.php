<?php
require_once "app/autoloader.php";
Autoloader::register();

session_start();

    //Nom de la page a charger
    $p = isset($_GET["p"]) ? $_GET["p"] : "home";

    //Dossier de la page
    $r = isset($_GET["r"]) ? $_GET["r"] . "/" : "";

require "api/" . $r . $p . ".php";
?>
