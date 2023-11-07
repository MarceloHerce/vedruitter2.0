<?php
    require_once(dirname(__DIR__)."\\config\\Config.php");
    require_once(dirname(__DIR__)."\\connection\\Connection.php");
    require_once(dirname(__DIR__)."\\model\\UserDAO.php");
    session_start();
    if($_GET["do"]=="Unfollow"){
        var_dump($_SESSION["usuario"]);
        $follows = $_SESSION["usuario"]->usersFollowed;
        var_dump($follows);
        echo "🤙🤙";
        $user = $_SESSION["usuario"];
        $idunfollow = $_GET["id"];
        unfollow($pdo,$user,$idunfollow);
        var_dump($follows);
        echo "<br>";
        var_dump($user->usersFollowed);
    }else{
        $user = $_SESSION["usuario"];
        $idTofollow = $_GET["id"];
        echo "🍌🍌";
        var_dump($user->usersFollowed);
        echo "<br>";
        follow($pdo,$user,$idTofollow);
        echo "<br>";
        var_dump($user->usersFollowed);
    }
    header("Location: ..\\controller\\UserPageController.php?id=".$_GET["id"]);
?>