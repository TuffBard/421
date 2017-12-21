<?php
/**
* Class gérant la auto-chargement des autres classes
*/
class Autoloader{

    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class){
        $class = str_replace("php\\","",$class);
        require $class . ".php";
    }
}
?>
