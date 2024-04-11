<?php

use db\usePdo;

require_once("PDO.php");

$pdo = new usePDO();

if (isset($_POST["dsNome"])){
    $dsNome = $_POST["dsNome"];
    $valor = $_POST["valor"];
    $fornecedor = $_POST["idFornecedor"];

    $query = "INSERT INTO produto (ds_nome, vl_unitario, id_fornecedor)
                    VALUES ('$dsNome', $valor, '$fornecedor')";

    $result = $pdo->insert($query);

    if (!$result) {
        die("Houvi um erro");
    }

    echo "Usuario cadastrado com sucesso";
}