<?php

class SeguradoraDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_seguradora){
        
        $sql = "INSERT INTO seguradora(descricao, ativo)VALUES(?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_seguradora['descricao']);
        $stmt->bindValue(2,$dados_seguradora['ativo']);
        $stmt->execute();
    }

    public function update($dados_seguradora){
        $sql = "UPDATE seguradora set descricao = ?, ativo = ? where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_seguradora['descricao']);
        $stmt->bindValue(2,$dados_seguradora['ativo']);
        $stmt->bindValue(3,$dados_seguradora['id']);

        $stmt->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM seguradora where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM seguradora");
        $stmt->execute();

        $arr_seguradora = array();

        while($f = $stmt->fetchObject()){
            $arr_seguradora[] = $f;
        }

        return $arr_seguradora;
    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM seguradora WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

}