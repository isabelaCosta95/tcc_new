<?php

class PlanoContasDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_plano_contas){
        
        $sql = "INSERT INTO plano_contas(descricao, ativo)VALUES(?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_plano_contas['descricao']);
        $stmt->bindValue(2,$dados_plano_contas['ativo']);
        $stmt->execute();
    }

    public function update($dados_plano_contas){
        $sql = "UPDATE plano_contas set descricao = ?, ativo = ? where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_plano_contas['descricao']);
        $stmt->bindValue(2,$dados_plano_contas['ativo']);
        $stmt->bindValue(3,$dados_plano_contas['id']);

        $stmt->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM plano_contas where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM plano_contas");
        $stmt->execute();

        $arr_plano_contas = array();

        while($f = $stmt->fetchObject()){
            $arr_plano_contas[] = $f;
        }

        return $arr_plano_contas;
    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM plano_contas WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();
    }
}