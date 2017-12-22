<?php
namespace App\Table;

use \mysqli;

/**
 * Classe database gérant la connexion à la BDD et l'éxécution des requetes
 */
class Database {
    private static $host = "127.0.0.1";
    private static $user = "root";
    private static $password = "";
    private static $db = "421";
    private static $pdo;

    /**
    * Obtient la connexion à la bdd
    */
    public static function getDb(){
        if(!isset(self::$pdo)){
            self::$pdo = new mysqli(self::$host, self::$user, self::$password, self::$db);
        }
        return self::$pdo;
    }

    /**
    * Execute une requete et renvoi son resultat
    * @param String $query Requete a executer
    * @return SqlResult
    */
    public static function select($query){
        $mysqli = self::getDb();
        return $mysqli->query($query);
    }

    /**
    * Ajoute un élement et renvoi son id
    * @param String $query Requete a executer
    * @return Int Id du nouvel élément
    */
    public static function insert($query){
        $mysqli = self::getDb();
        $mysqli->query($query);
        return $mysqli->insert_id;
    }

    public static function update($query){
        $mysqli = self::getDb();
        return $mysqli->query($query);
    }

    public static function delete($query){
        $mysqli = self::getDb();
        return $mysqli->query($query);
    }
}
?>
