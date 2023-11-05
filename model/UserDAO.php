<?php
require_once("../connection/Connection.php");
require("../model/User.php");

#Seleccionar los usuarios
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