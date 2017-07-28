<?php
/*
 * /php/connection/connectBD.php
 */
try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=nicolasehfbd', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
