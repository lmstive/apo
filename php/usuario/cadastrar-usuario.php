<?php


use db\usePdo;

require_once("PDO.php");

$pdo = new usePDO();

if (isset($_POST["dsNome"])){
    $dsNome = $_POST["dsNome"];
    $idade = $_POST["idade"];
    $estadoCivil = $_POST["estadoCivil"];
    $dsEndereco = $_POST["dsEndereco"];
    $dsEmail = $_POST["dsEmail"];
    $dsSenha = sha1($_POST["dsSenha"]);

    $query = "INSERT INTO usuario (ds_email, ds_senha, ds_nome, idade, ds_endereco)
                    VALUES ('$dsEmail', '$dsSenha', '$dsNome', '$idade',
                            '$dsEndereco')";

    $result = $pdo->insert($query);

    if (!$result) {
        die("Houvi um erro");
    }

    echo "Usuario cadastrado com sucesso";
}


