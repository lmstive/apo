<?php

use db\usePdo;

require_once("PDO.php");

$pdo = new usePDO();

if (isset($_POST["id"])){
    $id = $_POST["id"];

    $query = "DELETE FROM usuario WHERE id_usuario = $id";

    $result = $pdo->delete($query);

    echo "Deletada com sucesso";
}
