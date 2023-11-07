<?php
session_start();
require_once(dirname(__DIR__)."\\model\\UserDAO.php");

if(isset($_POST["login"])){
    $email = trim($_POST["mail"]);
    $pass = $_POST["password"];
    $name = $_POST["username"];
    existsUser($pdo,$email,$pass,$name);
} elseif (isset($_POST["register"])) {
    $email = trim($_POST["mail"]);
    $pass = $_POST["password"];
    $name = $_POST["username"];
    registerUser($pdo,$email,$pass,$name);
}else{
    echo "adios";
}
header("Location: ../index.php");
?>