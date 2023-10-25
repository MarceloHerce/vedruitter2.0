<?php
require_once("./connection/Connection.php");
require("./model/Product.php");

function selectAllVedrutweets($pdo){
    try{
        $statement = $pdo->query("SELECT * FROM publications ORDER BY createDate DESC")

        $result = [];
        foreach($statement->fetchAll() as $tweet){
            $objectT = new Vedrutweet($tweet["userId"], $tweet["text"], $tweet["createDate"]);
        }
        var_dump($result);
        return $result;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
        echo $e;
    }
}
$results = selectProducts($pdo);

// Cerrar la conexion
$pdo = null;
?>