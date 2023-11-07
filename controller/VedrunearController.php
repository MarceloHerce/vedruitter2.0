<?php
require_once(dirname(__DIR__)."\\config\\Config.php");
require_once(dirname(__DIR__)."\\model\\VedrutweetDAO.php");
require_once(dirname(__DIR__)."\\model\\UserDAO.php");
session_start();

var_dump($_SESSION["usuario"]);
if(!empty($_GET["vedrunada"])){
    insertVedrutweet($pdo,$_GET["vedrunada"],$_SESSION["usuario"]->id);
    selectVedrutweetsFromUser($pdo,$_SESSION["usuario"]);
}
header("Location: ..\index.php");
?>