<?php

class PecaDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_peca){
        
        $sql = "INSERT INTO peca(descricao, ativo, observacao)
        VALUES(?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_peca['descricao']);
        $stmt->bindValue(2,$dados_peca['ativo']);
        $stmt->bindValue(3,$dados_peca['observacao']);
        $stmt->execute();
    }

    public function update($dados_peca) {
        $sql = "UPDATE peca SET descricao = ?, ativo = ?, observacao = ? WHERE id = ?";
    
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_peca['descricao']);
        $stmt->bindValue(2, $dados_peca['ativo']);
        $stmt->bindValue(3, $dados_peca['observacao']);
        $stmt->bindValue(4, $dados_peca['id']); 
        $stmt->execute();
    }
    

    public function delete($id){
        $sql = "DELETE FROM peca where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM peca");
        $stmt->execute();

        $arr_peca = array();

        while($f = $stmt->fetchObject()){
            $arr_peca[] = $f;
        }

        return $arr_peca;
    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM peca WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

}