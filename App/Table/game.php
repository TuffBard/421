<?php
namespace App\Table;

use App\Table\Player;
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

  public function setPlayers($nbPlayer)
  {
      $this->nb_player = $nbPlayer;
      for($i=1;$i<=$nbPlayer;$i++){
        $this->players[$i] = new Player();
      }
  }
}
?>
