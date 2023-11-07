<?php

require_once(dirname(__DIR__)."\\model\\VedrutweetDAO.php");
require_once(dirname(__DIR__)."\\model\\UserDAO.php");
require_once(dirname(__DIR__)."\\model\\User.php");
require_once(dirname(__DIR__)."\\model\\Vedrutweet.php");

#Seleccionar ususarios
$_SESSION["global"]->setUsers(selectAllUsers($pdo));
#Todos los tweets
$_SESSION["global"]->setVedrutweets(selectAllVedrutweets($pdo));
$pubTodos = $_SESSION["global"]->vedrutweets;
#Tweets de seguidos
#$_SESSION["usuario"] = in_array($_SESSION["global"]->users);
#$results = selectProducts($pdo);
// echo"<br>";
// echo"usuario followers";
// var_dump( $_SESSION["usuario"]->usersFollowers);
// echo"<br>";

selectFollowed($pdo, $_SESSION["usuario"]);
// echo"usersFollowed";
// var_dump($_SESSION["usuario"]->usersFollowed);
// echo"<br>";
$pubSeguidos = selectFollowedVedrutweets($pdo,$_SESSION["usuario"]);
// echo"<br>";
require("./view/HomeView.php");

// Cerrar la conexion
$pdo = null;
?>