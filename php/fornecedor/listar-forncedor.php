<?php

use db\usePdo;

require_once("PDO.php");

$pdo = new usePDO();

$query = "SELECT * FROM fornecedor";

$result = $pdo->select($query);

$jsonString = json_encode($result);
echo $jsonString;