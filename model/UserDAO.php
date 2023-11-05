<?php
require_once(dirname(__DIR__).'\\connection\\Connection.php');
#D:\GitProjects\vedruitter2.0\connection\Connection.php
require_once(dirname(__DIR__).'\\model\\User.php');
require_once(dirname(__DIR__).'\\model\\Vedrutweet.php');
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
            $usuario2 = new User ($usuario["id"], $usuario["username"],$usuario["email"],$usuario["password"],
            $usuario["description"], $usuario["createDate"]);
            selectVedrutweetsFromUser($pdo,$usuario2);
            if (password_verify($pass, $usuario2->password)) {
                var_dump($usuario);
                echo "<br>";
                var_dump($usuario2);
                echo "<br>";
                var_dump($_SESSION["usuario"]);
                $_SESSION["usuario"] = ($usuario2);
                echo "<br>";
                var_dump($_SESSION["usuario"]);
                echo "<br>"."como <br>";
                var_dump($_SESSION["usuario"]);
            
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
        foreach($statement->fetchAll() as $username){
            $objectT = new User($username["id"], $username["username"],$username["email"],$username["password"],
            $username["description"], $username["createDate"]);
            selectVedrutweetsFromUser($pdo,$objectT);
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
#Seleccionar todos los usuarios
function selectAllUsers($pdo){
    try{
        $statement = $pdo->prepare("SELECT * FROM users");
        $statement->execute();
        $result = [];
        foreach($statement->fetchAll() as $user){
            $objectU = new User($user["id"], $user["username"],$user["email"],$user["password"],
            $user["description"], $user["createDate"]);
            selectVedrutweetsFromUser($pdo,$objectU);
            array_push($result, $objectU);
            #TODO push a array general de users
            #array_push($_SESSION["global"]->users, $objectU);
        }
        return $result;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion del vedrutweet";
        echo $e;
    }
}
#Seleccionar los usuarios seguidos
function selectFollowed($pdo, User $user){
    try{
        $statement = $pdo->prepare("SELECT DISTINCT userToFollowId FROM follows WHERE users_id = (?)");
        $id= $user->id;
        $statement->bindParam(1,$id);
        $statement->execute();
        foreach($statement->fetchAll() as $idUser){
            $idU = $idUser["userToFollowId"];
            if(!in_array((int) $idU,$user->usersFollowed)){
                $user->pushToData("usersFollowed", $idU);
            }
        }
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion del vedrutweet";
        echo $e;
    }
}

#Seleccionar los seguidores
function selectFollowers($pdo, User $user){
    try{
        $statement = $pdo->prepare("SELECT DISTINCT userToFollowId FROM users_id WHERE userToFollowId = (?);");
        $id= $user->id;
        $statement->bindParam(1,$id);
        $statement->execute();
        foreach($statement->fetchAll() as $idUser){
            $idU = $idUser["userToFollowId"];
            if(!in_array($idU,$user->usersFollowers)){
                $user->pushToData("usersFollowers", $idU);
            }
        }
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion del vedrutweet";
        echo $e;
    }
}

#Seleccionar Vedrutweets del usuario
function selectVedrutweetsFromUser($pdo,$user){
    try{
        $statement = $pdo->prepare("SELECT * FROM social_network.publications WHERE userId = (?) ORDER BY createDate DESC");
        $id= $user->id;
        $statement->bindParam(1,$id);
        $statement->execute();
        foreach($statement->fetchAll() as $tweet){
            $objectT = new Vedrutweet($tweet["id"],$tweet["userId"],$tweet["text"],$tweet["createDate"]);
            $user->pushToData("vedrutweets", $objectT);
        }
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion del vedrutweet";
        echo $e;
    }
}
?>