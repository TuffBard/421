<?php 
require_once("../connection/connectBD.php");
session_start();

$username = $_POST["username"];
$password = $_POST["password"];
$query = "SELECT * 
          FROM user 
          WHERE Username = '$username'
          AND Password = '$password'";

$result = $bdd->query($query);
if($result->rowCount()){
    //echo "Connection success !";
    $_SESSION["userId"] = $result->fetch()["Id"];
    header("location: ./home.php");
} else {
    //echo "Connection failed !";
    header("location: ../../connect.php");
}
?>