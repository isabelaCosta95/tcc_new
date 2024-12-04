<?php

class PaleteDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_palete){
        
        $sql = "INSERT INTO palete(tipo, quantidade, justificativa)
        VALUES(?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);+
        $stmt->bindValue(1,$dados_palete['tipo']);
        $stmt->bindValue(2,$dados_palete['quantidade']);
        $stmt->bindValue(3,$dados_palete['justificativa']);
        $stmt->execute();
    }

    public function update($dados_palete) {
        $sql = "UPDATE palete SET tipo = ?, quantidade = ?, justificativa = ? WHERE id = ?";
    
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_palete['tipo']);
        $stmt->bindValue(2, $dados_palete['quantidade']);
        $stmt->bindValue(3, $dados_palete['justificativa']);
        $stmt->bindValue(4, $dados_palete['id']); 
        $stmt->execute();
    }
    

    public function delete($id){
        $sql = "DELETE FROM palete where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM palete");
        $stmt->execute();

        $arr_pal = array();

        while($f = $stmt->fetchObject()){
            $arr_pal[] = $f;
        }

        return $arr_pal;
    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM palete WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

}