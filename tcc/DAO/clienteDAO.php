<?php

class ClienteDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_cliente){
        
        $sql = "INSERT INTO cliente(razao_social, nome_fantasia, cnpj_cpf, inscricao_estadual, endereco, 
        bairro, complemento, numero, cidade, estado, telefone1, telefone2, observacao, ativo, email)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);+
        $stmt->bindValue(1,$dados_cliente['razao_social']);
        $stmt->bindValue(2,$dados_cliente['nome_fantasia']);
        $stmt->bindValue(3,$dados_cliente['cnpj_cpf']);
        $stmt->bindValue(4,$dados_cliente['inscricao_estadual']);
        $stmt->bindValue(5,$dados_cliente['endereco']);
        $stmt->bindValue(6,$dados_cliente['bairro']);
        $stmt->bindValue(7,$dados_cliente['complemento']);
        $stmt->bindValue(8,$dados_cliente['numero']);
        $stmt->bindValue(9,$dados_cliente['cidade']);
        $stmt->bindValue(10,$dados_cliente['estado']);
        $stmt->bindValue(11,$dados_cliente['telefone1']);
        $stmt->bindValue(12,$dados_cliente['telefone2']);
        $stmt->bindValue(13,$dados_cliente['observacao']);
        $stmt->bindValue(14,$dados_cliente['ativo']);
        $stmt->bindValue(15,$dados_cliente['email']);
        $stmt->execute();
    }

    public function update($dados_cliente) {
        $sql = "UPDATE cliente SET razao_social = ?, nome_fantasia = ?, cnpj_cpf = ?, inscricao_estadual = ?, endereco = ?, bairro = ?, complemento = ?, numero = ?, cidade = ?, estado = ?, telefone1 = ?, telefone2 = ?, observacao = ?, ativo = ?, email = ? WHERE id = ?";
    
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_cliente['razao_social']);
        $stmt->bindValue(2, $dados_cliente['nome_fantasia']);
        $stmt->bindValue(3, $dados_cliente['cnpj_cpf']);
        $stmt->bindValue(4, $dados_cliente['inscricao_estadual']);
        $stmt->bindValue(5, $dados_cliente['endereco']);
        $stmt->bindValue(6, $dados_cliente['bairro']);
        $stmt->bindValue(7, $dados_cliente['complemento']);
        $stmt->bindValue(8, $dados_cliente['numero']);
        $stmt->bindValue(9, $dados_cliente['cidade']);
        $stmt->bindValue(10, $dados_cliente['estado']);
        $stmt->bindValue(11, $dados_cliente['telefone1']);
        $stmt->bindValue(12, $dados_cliente['telefone2']);
        $stmt->bindValue(13, $dados_cliente['observacao']);
        $stmt->bindValue(14, $dados_cliente['ativo']);
        $stmt->bindValue(15, $dados_cliente['email']);
        $stmt->bindValue(16, $dados_cliente['id']); 
        $stmt->execute();
    }
    

    public function delete($id){
        $sql = "DELETE FROM cliente where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM cliente");
        $stmt->execute();

        $arr_cli = array();

        while($f = $stmt->fetchObject()){
            $arr_cli[] = $f;
        }

        return $arr_cli;
    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM cliente WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

}