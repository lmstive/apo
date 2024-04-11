<?php

use db\usePdo;

require_once("PDO.php");

$pdo = new usePDO();
$pdo->createDB();
$pdo->createTable();

$search = $_POST["search"];

if (isset($_POST["dsEmail"])) {
    $dsEmail = $_POST["dsEmail"];
    $dsSenha = sha1($_POST["dsSenha"]);
    $query = "SELECT * FROM usuario WHERE ds_email = '$dsEmail' AND ds_senha = '$dsSenha'";
    $result = $pdo->select($query);

    $jsonString = json_encode($result);
    echo $result;
}
