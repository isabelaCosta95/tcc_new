<?php

class PlanoContasDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_plac){
        
        $sql = "INSERT INTO plano_conta(descricao, ativo, natureza, observacao, tipo)VALUES(?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_plac['descricao']);
        $stmt->bindValue(2,$dados_plac['ativo']);
        $stmt->bindValue(3,$dados_plac['natureza']);
        $stmt->bindValue(4,$dados_plac['observacao']);
        $stmt->bindValue(5,$dados_plac['tipo']);
        $stmt->execute();
    }

    public function update($dados_plac){
        $sql = "UPDATE plano_conta set descricao = ?, ativo = ?, natureza = ?, observacao = ?, tipo = ? where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_plac['descricao']);
        $stmt->bindValue(2,$dados_plac['ativo']);
        $stmt->bindValue(3,$dados_plac['natureza']);
        $stmt->bindValue(4,$dados_plac['observacao']);
        $stmt->bindValue(5,$dados_plac['tipo']);
        $stmt->bindValue(6,$dados_plac['id']);

        $stmt->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM plano_conta where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM plano_conta");
        $stmt->execute();

        $arr_plano_contas = array();

        while($f = $stmt->fetchObject()){
            $arr_plano_contas[] = $f;
        }

        return $arr_plano_contas;
    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM plano_conta WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();
    }
}