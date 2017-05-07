<?php
require_once("player.php");
class Game {
  ///Properties
  public $nb_player;
  public $players = [];
  ///Public function
  public function __construct()
  {
      $this->nb_player = 2;
      $this->players[1] = new Player();
      $this->players[2] = new Player();
  }
}
?>
