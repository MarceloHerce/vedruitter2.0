<?php 
require_once("../connection/Connection.php");
require_once("User.php");

$statement = $pdo->prepare("SELECT * FROM users");
$statement->execute();
var_dump($statement);
$result = [];
foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $user){
    $objectT = new User($user["id"], $user["username"],$user["email"],$user["password"],$user["description"], $user["createDate"]);
    array_push($result, $objectT);
}
var_dump($result);


$statement = $pdo->prepare("SELECT * FROM users WHERE username='marcelo'");
$statement->execute();
var_dump($statement);
$result2 = [];
foreach($statement->fetchAll(PDO::FETCH_NUM) as $tweet){
    $objectT = new User($tweet[0], $tweet[1],$tweet[2],$tweet[3],$tweet[4], $tweet[5]);
    array_push($result2, $objectT);
}
var_dump($result2);


?>