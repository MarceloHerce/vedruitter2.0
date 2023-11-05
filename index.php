<a href="model/Logout.php" class="m-3 btn btn-primary">Logout</a>
<?php
    require_once("config\\Config.php");
    session_start();
    #session_unset();
    require_once("model/Web.php");
    if(!isset($_SESSION["global"])){
        $_SESSION["global"] = new Web(); 
    }
    require_once("view/LoginView.php");
    require_once("model/User.php");
    if(!isset($_SESSION["usuario_deserializado"]) && !isset($_SESSION["usuario"])){
        #Problema de serializacion 30 min por esta mierda
        $userTemp = unserialize($_SESSION["usuario"]);
        $_SESSION["usuario"] =$userTemp;
        $_SESSION["usuario_deserializado"] = "yes";
    }
    echo "<br>";
    var_dump($_SESSION["usuario"]);
    echo "<br>";
    var_dump($_SESSION["usuario_deserializado"]);
    echo "<br>";
    var_dump($_SESSION["global"]);
    echo "<br>";
    echo "<br>";
    

    require_once("controller/HomeController.php");
?>