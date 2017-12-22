<?php
namespace App\Table;

use App\Table\Player;
use App\Table\Database;
use \DateTime;

/**
 * Classe gérant les parties
 */
class Game {
  public $id;
  public $date;
  public $nbPlayer;
  public $lieu;
  public $nom;
  public $userId;
  public $players = [];

  /**
   * Constructeur de la classe
   * @param Int       $nbPlayer   Nombre de joueur dans la partie
   * @param String    $nom        Nom de la partie
   * @param DateTime  $date       Date de début de partie
   * @param String    $lieu       Lieu de la partie
   * @param Int       $userId     Id de l'utilisateur lié à cette partie
   */
  public function __construct($id, $nbPlayer, $nom, $date, $lieu, $userId)
  {
      $this->id = $id;
      $this->nbPlayer = $nbPlayer;
      $this->nom = $nom;
      $this->date = new DateTime();
      $this->lieu = $lieu;
      $this->userId = $userId;

      for($i=1;$i<=$nbPlayer;$i++){
        $this->players[$i] = new Player();
      }
  }

  /**
   * Modifie le nombre de joueur
   */
  public function setPlayers($nbPlayer)
  {
      $this->nbPlayer = $nbPlayer;
      for($i=1;$i<=$nbPlayer;$i++){
        $this->players[$i] = new Player();
      }
  }

  /**
  * Renvoi une liste de client en fonction de la requete entrée
  * @param String $query Requete de recherche
  * @return Array<Client> Liste des clients trouvés
  */
  public static function getList($query){
      $result = Database::select($query);
      $games = [];
      while($row = $result->fetch_array(MYSQL_ASSOC)) {
          $games[] = new Game($row["id"],$row["nb_player"], $row["nom"], $row["created"], $row["lieu"], $row["userId"]);
      }
      return $games;
  }

  /**
   * Renvoi la liste des parties d'un utilisateur
   * @param Int $userId Id de l'utilisateur
   * @return Array<Game> Liste des parties de l'utilisateur
   */
  public static function getByUserId($userId){
    $query = "SELECT * FROM game WHERE userId = $userId";
    return self::getList($query);
  }
}
?>
