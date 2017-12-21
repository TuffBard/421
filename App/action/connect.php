<?php 
require_once("../connection/connectBD.php");
session_start();

$username = $_POST["username"];
$password = hash("ripemd160",$_POST["password"]);
$query = "SELECT * 
          FROM user 
          WHERE Username = '$username'
          AND Password = '$password'";

$result = $bdd->query($query);
if($result->rowCount()){
    //echo "Connection success !";
    $res = $result->fetch();
    $_SESSION["userId"] = $res["Id"];
    $_SESSION["userName"] = $res["Username"];
    header("location: ../../home.php");
} else {
    echo "Connection failed ! $password";
    //header("location: ../../connect.php");
}
?>