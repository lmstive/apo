<?php

use db\usePdo;

require_once("PDO.php");

$pdo = new usePDO();

if (isset($_POST["idPedido"])){
    $idPedido = $_POST["idPedido"];
    $idProduto = $_POST["idProduto"];

    $query = "INSERT INTO pedido_prduto (id_pedido, id_produto)
                    VALUES ('$idPedido', '$idProduto')";

    $result = $pdo->insert($query);

    echo "Pedido atualizado";
}
