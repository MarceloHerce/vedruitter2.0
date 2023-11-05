<?php

var_dump(BASE_PATH);
require(BASE_PATH . "/model/ProductDAO.php");

$results = selectProducts($pdo);

// Cerrar la conexion
$pdo = null;
require(BASE_PATH . "/view/ProductView.php");
?>