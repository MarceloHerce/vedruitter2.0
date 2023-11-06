<?php
#require_once(dirname(__DIR__)."\\model\\");
#require_once(dirname(__DIR__)."\\model\\");
require_once(dirname(__DIR__)."\\config\\Config.php");
require_once(dirname(__DIR__)."\\model\\WebDAO.php");
session_start();
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $users = $_SESSION["global"]->users;
    $userInfo = findUserById($users,$id);
    $pubUser = $userInfo->vedrutweets;
    require_once(dirname(__DIR__)."\\view\\UserPageView.php");
}

?>