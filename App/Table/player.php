<?php
namespace App\Table;

/**
 * Classe gérant les joueurs
 */
class Player{
  public $nom;
  public $turns = [];
  public $total;

  /**
   * Constructeur de la classe
   */
  public function __construct(){
    $this->nom = "Joueur";
    $this->total = 0;
  }

  /**
   * Ajoute un tour
   */
  public function add_turn($turn, $score){
    $this->turns[$turn] = $score;
    $this->refresh_total();
  }

  /**
   * Raffraichis le total
   */
  public function refresh_total(){
    $this->total = 0;
    foreach ($this->turns as $turn)
    {
    	$this->total += $turn;
    }
  }
}
?>
