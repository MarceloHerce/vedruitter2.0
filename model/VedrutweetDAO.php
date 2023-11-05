<?php
require_once(dirname(__DIR__)."\\connection\\Connection.php");
require_once(dirname(__DIR__)."\\model\\Vedrutweet.php");

function selectAllVedrutweets($pdo){
    try{
        $statement = $pdo->query("SELECT * FROM publications ORDER BY createDate DESC");

        $result = [];
        foreach($statement->fetchAll() as $tweet){
            $objectT = new Vedrutweet($tweet["userId"], $tweet["text"], $tweet["createDate"]);
            array_push($result, $objectT);
            #TODO push a array general de tweets
            #array_push($_SESSION["global"]->users, $objectU);
        }
        return $result;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion del vedrutweet";
        echo $e;
    }
}
function selectName($pdo,Vedrutweet $tweet){
    try{
        $statement = $pdo->prepare("SELECT username FROM users WHERE id = (?)");
        $id= $tweet->userId;
        $statement->bindParam(1,$id);
        $statement->execute();
        return $statement->fetch()["username"];
    }catch(Exception $e){
        echo "error de busqueda";
    }
}
function selectFollowedVedrutweets($pdo, $user){
    try{
        $statement = $pdo->prepare("SELECT * FROM publications WHERE id IN (?) ORDER BY createDate DESC");
        $ids = implode(',', $user->usersFollowed);
        $statement->bindParam(1,$ids);
        $statement->execute();
        $result = [];
        foreach($statement->fetchAll() as $tweet){
            $objectT = new Vedrutweet($tweet["userId"], $tweet["text"], $tweet["createDate"]);
            array_push($result, $objectT);
            #TODO push a array general de tweets
            #array_push($_SESSION["global"]->users, $objectU);
        }
        return $result;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion del vedrutweet";
        echo $e;
    }
}
?>