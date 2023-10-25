<?php

require("./model/ProductDAO.php");

$results = selectProducts($pdo);

// Cerrar la conexion
$pdo = null;

require("./view/ProductView.php");
?>