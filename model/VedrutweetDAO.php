<?php
require_once("../connection/Connection.php");
require("../model/Vedrutweet.php");

function selectAllVedrutweets($pdo){
    try{
        $statement = $pdo->query("SELECT * FROM publications ORDER BY createDate DESC");

        $result = [];
        foreach($statement->fetchAll() as $tweet){
            $objectT = new Vedrutweet($tweet["userId"], $tweet["text"], $tweet["createDate"]);
            array_push($result, $objectT);
            #TODO push a array general de tweets
        }
        var_dump($result);
        return $result;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion del vedrutweet";
        echo $e;
    }
}
function selectFollowedVedrutweets($pdo, $user){
    #TODO
}
?>