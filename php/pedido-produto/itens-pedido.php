<?php

use db\usePdo;

require_once("PDO.php");

$pdo = new usePDO();

$query = "SELECT * FROM pedido_prduto pd JOIN produto p ON pd.id_produto = p.id_produto WHERE pd.id_pedido = 10";

$result = $pdo->select($query);

$jsonString = json_encode($result);
echo $jsonString;
