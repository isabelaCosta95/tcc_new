<?php

class EstadoDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_estado){
        
        $sql = "INSERT INTO estado(sigla, descricao, codigo_uf)VALUES(?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_estado['sigla']);
        $stmt->bindValue(2,$dados_estado['descricao']);
        $stmt->bindValue(3,$dados_estado['codigo_uf']);
        $stmt->execute();
    }

    public function update($dados_estado){
        $sql = "UPDATE estado set sigla = ?, descricao = ?, codigo_uf = ? where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_estado['sigla']);
        $stmt->bindValue(2,$dados_estado['descricao']);
        $stmt->bindValue(3,$dados_estado['codigo_uf']);
        $stmt->bindValue(4,$dados_estado['id']);

        $stmt->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM estado where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM estado");
        $stmt->execute();

        $arr_estado = array();

        while($f = $stmt->fetchObject()){
            $arr_estado[] = $f;
        }

        return $arr_estado;
    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM estado WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

}