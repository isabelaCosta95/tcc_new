<?php

class CategoriaDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_categoria){
        
        $sql = "INSERT INTO categoria(descricao, ativo)VALUES(?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_categoria['descricao']);
        $stmt->bindValue(2,$dados_categoria['ativo']);
        $stmt->execute();
    }

    public function update($dados_categoria){
        $sql = "UPDATE categoria set descricao = ?, ativo = ? where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_categoria['descricao']);
        $stmt->bindValue(2,$dados_categoria['ativo']);
        $stmt->bindValue(3,$dados_categoria['id']);

        $stmt->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM categoria where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM categoria");
        $stmt->execute();

        $arr_categoria = array();

        while($f = $stmt->fetchObject()){
            $arr_categoria[] = $f;
        }

        return $arr_categoria;
    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM categoria WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

}