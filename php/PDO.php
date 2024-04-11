<?php

namespace db;

use PDO;
use PDOException;

class usePdo
{
    private $servername = "127.0.0.1";
    private $username = "root";
   // private $password = "root";
    private $dbname = "sistema";
    private $instance;
    private $listCreateTable = [
        "CREATE TABLE IF NOT EXISTS usuario(
            id_usuario INT (6) AUTO_INCREMENT PRIMARY KEY,
            ds_email VARCHAR(50) NOT NULL,
            ds_senha VARCHAR(250) NOT NULL,
            ds_nome VARCHAR(250) NOT NULL,
            idade INT(3) NOT NULL,
        
            ds_endereco VARCHAR(250) NOT NULL
        )",
        "CREATE TABLE IF NOT EXISTS fornecedor(
            id_fornecedores INT (6) AUTO_INCREMENT PRIMARY KEY,
            ds_nome VARCHAR (250),
            ds_endereco VARCHAR(250),
            ds_telefone VARCHAR(30)
        )",
        "CREATE TABLE IF NOT EXISTS produto(
            id_produto INT (6) AUTO_INCREMENT PRIMARY KEY,
            ds_nome VARCHAR(250) NOT NULL,
            vl_unitario DOUBLE NOT NULL,
            id_fornecedor INT(6) NOT NULL,
            FOREIGN KEY (id_fornecedor) REFERENCES fornecedor(id_fornecedores)
        )",
        "CREATE TABLE IF NOT EXISTS pedido(
            id_pedido INT (6) AUTO_INCREMENT PRIMARY KEY,
            id_usuario INT (6),
            FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
        )",
        "CREATE TABLE IF NOT EXISTS pedido_prduto(
            id_pedido INT (6),
            id_produto INT (6),
            FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido),
            FOREIGN KEY (id_produto) references produto(id_produto)
        )"
    ];


    function getInstance()
    {
        if (empty($this->instance)){
            $this->instance = $this->connection();
        }
        return $this->instance;
    }

    private function connection()
    {
        $con = null;
        try {
            $con = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        }
        catch (PDOException $e)
        {
            return $con;
        }
    }

    function createDB()
    {

        $sql = "";
        try {
            $cnx = $this->getInstance();
            echo $cnx==null;
            if ($cnx===null){
                $cnx = new PDO("mysql:host=$this->servername", $this->username);
                $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            $sql = "CREATE DATABASE IF NOT EXISTS $this->dbname";
            $cnx->exec($sql);
        }
        catch (PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    function createTable()
    {
        try {
            foreach ($this->listCreateTable as $sql){
                $cnx = $this->getInstance();
                $cnx->exec($sql);

            }
        }
        catch (PDOException $e)
        {
            echo "<br>". $e->getMessage();
        }
    }

    function insert($sql)
    {
        try {
            $cnx = $this->getInstance();

            $error = $cnx->prepare($sql);
            $error->execute();

            if ($error->errorCode() == 0) {
                return $this->connection()->lastInsertId();
            }
            else{
                return "Falha ao Inserir dados";
            }
        }
        catch (PDOException $e)
        {
            return $e;
        }
    }

    function select($sql)
    {
        try {
            $cnx = $this->getInstance();
            $result = $cnx->query($sql);

            return $result->fetchAll();
        }
        catch (PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    function update($sql)
    {
        try {
            $cnx = $this->getInstance();
            $result = $cnx->query($sql);

            return $result;
        }
        catch (PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    function delete($sql)
    {
        try {
            $cnx = $this->getInstance();
            $result = $cnx->query($sql);

            return $result;
        }
        catch (PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}