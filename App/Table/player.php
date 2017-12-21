<?php
namespace App\Table;

class Player{
  public $nom;
  public $turns = [];
  public $total;

  public function __construct(){
    $this->nom = "Joueur";
    $this->total = 0;
  }

  public function add_turn($turn, $score){
    $this->turns[$turn] = $score;
    $this->refresh_total();
  }

  public function refresh_total(){
    $this->total = 0;
    foreach ($this->turns as $turn)
    {
    	$this->total += $turn;
    }
  }
}
?>
