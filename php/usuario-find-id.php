<?php

use db\usePdo;

require_once("PDO.php");

$pdo = new usePDO();

if (isset($_POST["id"])) {

    $id = $_POST["id"];

    $query = "SELECT * FROM usuario WHERE id_usuario = $id";
    $result = $pdo->select($query);

    if (!$result){
        die("Houve um erro na colsulta");
    }
    echo json_encode($result);
}
