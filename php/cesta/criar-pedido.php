<?php

use db\usePdo;

require_once("PDO.php");

$pdo = new usePDO();

if (isset($_POST["idUsuario"])){
    $idUsuario = $_POST["idUsuario"];

    $query = "INSERT INTO pedido (id_usuario)
                    VALUES ($idUsuario)";

    $result = $pdo->insert($query);

    $queryBusca = "SELECT * FROM pedido WHERE id_usuario = $idUsuario";
    $resultBuscar = $pdo->select($queryBusca);
    $jsonString = json_encode($resultBuscar);

    echo $jsonString;
}
