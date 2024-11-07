<?php

class MySQL extends PDO{
    private $host       = "localhost";
    private $usuario    = "root";
    private $senha      = "";
    private $db         = "tcc";

    private $opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    public function __construct(){
        $dsn = "mysql:host=".$this->host.";dbname=".$this->db;
        return parent::__construct($dsn, $this->usuario, $this->senha, $this->opcoes);
    }
}

