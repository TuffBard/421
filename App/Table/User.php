<?php
namespace App\Table;

/**
* Classe gérant les utilisateurs de l'application
*/
class User {
    public $id;
    public $login;
    public $name;
    public $firstname;
    public $password;

    /**
    * Constructeur de la classe
    * @param Int       $id     Id de l'utilisateur
    * @param String    $login  Login de l'utilisateur
    */
    public function __construct($id, $login, $password, $name, $firstname){
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
        $this->$firstname = $firstname;
    }

    /**
    * Connexion d'un utilisateur
    * @param  String $login    Login de l'utilisateur
    * @param  String $password Mot de passe de l'utilisateur
    * @return User           Retourne l'utilisateur ou NULL
    */
    public static function connect($login, $password){
        $password = sha1($password);
        $query = "SELECT * FROM user WHERE login = '$login' AND password = '$password'";
        $result = Database::select($query);
        if($result->num_rows != 0){
            $row = $result->fetch_array();
            $user = new User($row["id"],$row["login"],$row["password"],$row["nom"],$row["prenom"]);
            return $user;
        }
        return NULL;
    }
}
?>
