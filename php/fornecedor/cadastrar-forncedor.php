<?php

use db\usePdo;

require_once("PDO.php");

$pdo = new usePDO();

if (isset($_POST["dsNome"])){
    $dsNome = $_POST["dsNome"];
    $dsEndereco = $_POST["dsEndereco"];
    $dsTelefone = $_POST["dsTelefone"];

    $query = "INSERT INTO fornecedor (ds_nome, ds_endereco, ds_telefone)
                    VALUES ('$dsNome', '$dsEndereco', '$dsTelefone')";

    $result = $pdo->insert($query);

    if (!$result) {
        die("Houve um erro");
    }

    echo "Usuario cadastrado com sucesso";
}
