<?php
session_start();
require_once("../connection/connectBD.php");

$query = "SELECT g.Name, count(t.PlayerId) as NbPlayer, max(NumTurn) as NbTurn
        FROM game g, turn t 
        WHERE g.id = 1
        AND g.Id = t.GameId
        GROUP BY g.Name";
$results = $bdd->query($query);
$results = $results->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($results);
?>