<?php
session_start();
require_once(dirname(__DIR__)."\\model\\UserDAO.php");
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
?>