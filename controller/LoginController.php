<?php
session_start();
require_once("../model/UserDAO.php");
if(isset($_POST["login"])){
    var_dump($_POST);
    $email = trim($_POST["mail"]);
    $pass = $_POST["password"];
    $name = $_POST["username"];
    echo $name." ".$email." ".$pass;
    echo '<br>';
    existsUser($pdo,$email,$pass,$name);
} elseif (isset($_POST["register"])) {
    echo "Te quieres registrar en esta mierda";
    $email = trim($_POST["mail"]);
    $pass = $_POST["password"];
    $name = $_POST["username"];
    registerUser($pdo,$email,$pass,$name);
}else{
    echo "adios";
}
#require("./model/ProductDAO.php");

#$results = selectProducts($pdo);

// Cerrar la conexion
#$pdo = null;

#require("./view/ProductView.php");
?>