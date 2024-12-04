<?php

class SeguradoraDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_seguradora){
        
        $sql = "INSERT INTO seguradora(nome, cnpj, email, inscricao_estadual, contato, telefone)VALUES(?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_seguradora['nome']);
        $stmt->bindValue(2,$dados_seguradora['cnpj']);
        $stmt->bindValue(3,$dados_seguradora['email']);
        $stmt->bindValue(4,$dados_seguradora['inscricao_estadual']);
        $stmt->bindValue(5,$dados_seguradora['contato']);
        $stmt->bindValue(6,$dados_seguradora['telefone']);
        $stmt->execute();
    }

    public function update($dados_seguradora){
        $sql = "UPDATE seguradora set nome = ?, cnpj = ?, email = ?, inscricao_estadual = ?, contato = ?, telefone = ? where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_seguradora['nome']);
        $stmt->bindValue(2,$dados_seguradora['cnpj']);
        $stmt->bindValue(3,$dados_seguradora['email']);
        $stmt->bindValue(4,$dados_seguradora['inscricao_estadual']);
        $stmt->bindValue(5,$dados_seguradora['contato']);
        $stmt->bindValue(6,$dados_seguradora['telefone']);
        $stmt->bindValue(7,$dados_seguradora['id']);

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