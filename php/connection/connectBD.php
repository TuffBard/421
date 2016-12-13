<?php
/*
 * /php/connection/connectBD.php
 */
try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=421', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
