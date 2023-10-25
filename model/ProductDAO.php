<?php
require_once("./connection/Connection.php");
require("./model/Product.php");

function selectProducts($pdo) {
    try {
        //Hacemos la query
        $statement = $pdo->query("SELECT ProductName, UnitPrice,UnitsInStock FROM products");

        $results = [];
        foreach ($statement->fetchAll() as $p) {
            $objectP = new Product($p["ProductName"], $p["UnitPrice"], $p["UnitsInStock"]);
            array_push($results, $objectP);
        }
        return $results;
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}

?>