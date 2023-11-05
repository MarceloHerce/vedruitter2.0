<?php
require_once("../connection/Connection.php");
require("../model/User.php");

#Resgistrar usuario
function registerUser($pdo,$email,$pass,$name) {
    try{
        //Hacemos validadores necesarios
        $arrayErrores = array();
        if (!empty($name) && !is_numeric($name)) {
            $usernameValidado = true;
        } else {
            $usernameValidado = false;
            $arrayErrores["username"] = "El username no es valido";
        }

        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mailValidado = true;
        } else {
            $mailValidado = false;
            $arrayErrores["mail"] = "El mail no es valido";
        }

        if (!empty($pass)) {
            $passValidado = true;
        } else {
            $passValidado = false;
            $arrayErrores["password"] = "El password no es valido";
        }
        if(count($arrayErrores) == 0) {
            $statement = $pdo->prepare("INSERT INTO users VALUES( 0,( ? ), ( ? ), ( ? ),'', CURDATE())");
            $statement->bindParam(1,$name);
            $statement->bindParam(2,$email);
            $statement->bindParam(3,$pass);
            $statement->execute();
        }else {
            $_SESSION["errores"] = $arrayErrores;
        }
        header("Location: ../index.php");
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion del vedrutweet";
        echo $e;
    }
}
#Verificar usuario
function existsUser($pdo,$email,$pass,$name){
    try{
        $statement = $pdo->prepare("SELECT * FROM users WHERE username=('$name')");
        $statement->execute();
        $usuario = $statement->fetch(PDO::FETCH_ASSOC);
        #fetch() solo selecciona una fila si no hay fila es false
        if ($usuario) {
            var_dump($usuario);
            if (password_verify($pass, $usuario["password"])) {
                $_SESSION["usuario"] = $usuario;
            
                header("Location: ../index.php");
            } else {
                $_SESSION["error_login"] = "Login incorrecto";
                header("Location: ../index.php");
            }
        } else {
            $_SESSION["error_login"] = "Login incorrecto";
            header("Location: ../index.php");
        }
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion del vedrutweet";
        echo $e;
    }
}
#Seleccionar los usuario
function selectUser($pdo){
    try{
        $statement = $pdo->prepare("SELECT * FROM users WHERE username=(?)");
        $statement->binParam(1,$username);
        $statement->execute();
        $result = [];
        foreach($statement->fetchAll() as $tweet){
            $objectT = new User($tweet["id"], $tweet["username"],$tweet["email"],$tweet["password"],
            $tweet["description"], $tweet["createDate"]);
            array_push($result, $objectT);
            #TODO push a array general de users
        }
        var_dump($result);
        return $result;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion del vedrutweet";
        echo $e;
    }
}

#Seleccionar los usuarios seguidos
function selectFollowed($pdo, User $user){
    try{
        $statement = $pdo->prepare("SELECT userToFollowId FROM follows WHERE users_id = (?);");
        $statement->binParam(1,$user->id);
        $statement->execute();
        foreach($statement->fetchAll() as $tweet){
            $objectT = new Vedrutweet($tweet["userToFollowId"]);
            array_push($user->usersFollowed, $objectT);
        }
        var_dump($user->usersFollowed);
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion del vedrutweet";
        echo $e;
    }
}

#Seleccionar los seguidores
function selectFollowers($pdo, User $user){
    try{
        $statement = $pdo->prepare("SELECT userToFollowId FROM users_id WHERE userToFollowId = (?);");
        $statement->binParam(1,$user->id);
        $statement->execute();
        foreach($statement->fetchAll() as $tweet){
            $objectT = new Vedrutweet($tweet["userToFollowId"]);
            array_push($user->usersFollowers, $objectT);
        }
        var_dump($user->usersFollowers);
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion del vedrutweet";
        echo $e;
    }
}

#Seleccionar Vedrutweets del usuario
function selectVedrutweetsFromUser($pdo,$user, ){

}
?>