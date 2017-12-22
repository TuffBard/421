<?php
use App\Table\Game;

$userId = $_SESSION["user"]->id;

$games = Game::getByUserId($userId);

echo json_encode($games);
?>