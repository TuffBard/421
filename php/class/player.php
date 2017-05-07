<?php
class Player{
  public $nom;
  public $turns = [];

  public function __contstruct(){
    $this->nom = "";
  }

  public function add_turn($turn, $score){
    $this->turns[$turn] = $score;
  }

  public function total(){
    $result = 0;
    foreach ($this->turns as &$turn)
    {
    	$result += $turn;
    }
    return $result;
  }
}
?>
