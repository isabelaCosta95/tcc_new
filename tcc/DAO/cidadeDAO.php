<?php

class CidadeDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_cidade){
        
        $sql = "INSERT INTO cidade(id_estado, descricao, ibge)VALUES(?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_cidade['id_estado']);
        $stmt->bindValue(2,$dados_cidade['descricao']);
        $stmt->bindValue(3,$dados_cidade['ibge']);
        $stmt->execute();
    }

    public function update($dados_cidade){
        $sql = "UPDATE cidade set id_estado = ?, descricao = ?, ibge = ? where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_cidade['id_estado']);
        $stmt->bindValue(2,$dados_cidade['descricao']);
        $stmt->bindValue(3,$dados_cidade['ibge']);
        $stmt->bindValue(4,$dados_cidade['id']);

        $stmt->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM cidade where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM cidade");
        $stmt->execute();

        $arr_cid = array();

        while($f = $stmt->fetchObject()){
            $arr_cid[] = $f;
        }

        return $arr_cid;
    }


    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM cidade WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

}