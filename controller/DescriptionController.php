<?php
require_once(dirname(__DIR__)."\\config\\Config.php");
require_once(dirname(__DIR__)."\\model\\VedrutweetDAO.php");
require_once(dirname(__DIR__)."\\model\\UserDAO.php");
session_start();
if(!empty($_POST["modDes"])){
    var_dump($_POST);
    var_dump($_SESSION["usuario"]);
    modifyDescription($pdo,$_SESSION["usuario"],$_POST["modDes"]);
    $_SESSION["usuario"]->description = $_POST["modDes"];
}
header("Location: ..\index.php");
?>