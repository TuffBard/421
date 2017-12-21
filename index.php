<?php
require_once "app/autoloader.php";
Autoloader::register();

session_start();

if(!isset($_SESSION["user"])){
    $p = "connect";
    $r = "";
} else{
    //Nom de la page a charger
    $p = isset($_GET["p"]) ? $_GET["p"] : "home";

    //Dossier de la page
    $r = isset($_GET["r"]) ? $_GET["r"] . "/" : "";
}

ob_start();
require "pages/" . $r . $p . ".php";
$content = ob_get_clean();

require "pages/templates/layout.php";
?>
