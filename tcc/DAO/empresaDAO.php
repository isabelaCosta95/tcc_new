<?php

class EmpresaDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_empresa){
        
        $sql = "INSERT INTO empresa(descricao, ativo)VALUES(?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_empresa['descricao']);
        $stmt->bindValue(2,$dados_empresa['ativo']);
        $stmt->execute();
    }

    public function update($dados_empresa){
        $sql = "UPDATE empresa set descricao = ?, ativo = ? where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_empresa['descricao']);
        $stmt->bindValue(2,$dados_empresa['ativo']);
        $stmt->bindValue(3,$dados_empresa['id']);

        $stmt->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM empresa where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM empresa");
        $stmt->execute();

        $arr_empresa = array();

        while($f = $stmt->fetchObject()){
            $arr_empresa[] = $f;
        }

        return $arr_empresa;
    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM empresa WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

}