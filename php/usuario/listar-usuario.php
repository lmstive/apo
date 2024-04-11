<?php

use db\usePdo;

require_once("PDO.php");

$pdo = new usePDO();

$query = "SELECT * FROM usuario";

$result = $pdo->select($query);

$jsonString = json_encode($result);
echo $jsonString;

