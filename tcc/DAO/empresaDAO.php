<?php

class EmpresaDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_empresa){
        $sql = "INSERT INTO empresa (razao_social, nome_fantasia, email, telefone, inscricao_municipal, cnpj, inscricao_estadual, endereco, bairro, id_cidade, numero, complemento, id_estado) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $dados_empresa['razao_social']);
        $stmt->bindValue(2, $dados_empresa['nome_fantasia']);
        $stmt->bindValue(3, $dados_empresa['email']);
        $stmt->bindValue(4, $dados_empresa['telefone']);
        $stmt->bindValue(5, $dados_empresa['inscricao_municipal']);
        $stmt->bindValue(6, $dados_empresa['cnpj']);
        $stmt->bindValue(7, $dados_empresa['inscricao_estadual']);
        $stmt->bindValue(8, $dados_empresa['endereco']);
        $stmt->bindValue(9, $dados_empresa['bairro']);
        $stmt->bindValue(10, $dados_empresa['id_cidade']);
        $stmt->bindValue(11, $dados_empresa['numero']);
        $stmt->bindValue(12, $dados_empresa['complemento']);
        $stmt->bindValue(13, $dados_empresa['id_estado']);
    
        $stmt->execute();
    }
    

    public function update($dados_empresa){
    $sql = "UPDATE empresa SET razao_social = ?, nome_fantasia = ?, email = ?, telefone = ?, inscricao_municipal = ?, cnpj = ?, inscricao_estadual = ?, endereco = ?, bairro = ?, id_cidade = ?, numero = ?, complemento = ?, id_estado = ? 
    WHERE id = ?";

    $stmt = $this->conexao->prepare($sql);

    $stmt->bindValue(1, $dados_empresa['razao_social']);
    $stmt->bindValue(2, $dados_empresa['nome_fantasia']);
    $stmt->bindValue(3, $dados_empresa['email']);
    $stmt->bindValue(4, $dados_empresa['telefone']);
    $stmt->bindValue(5, $dados_empresa['inscricao_municipal']);
    $stmt->bindValue(6, $dados_empresa['cnpj']);
    $stmt->bindValue(7, $dados_empresa['inscricao_estadual']);
    $stmt->bindValue(8, $dados_empresa['endereco']);
    $stmt->bindValue(9, $dados_empresa['bairro']);
    $stmt->bindValue(10, $dados_empresa['id_cidade']);
    $stmt->bindValue(11, $dados_empresa['numero']);
    $stmt->bindValue(12, $dados_empresa['complemento']);
    $stmt->bindValue(13, $dados_empresa['id_estado']);
    $stmt->bindValue(14, $dados_empresa['id']); 

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