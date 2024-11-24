<?php

class PecaDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_peca){
        
        $sql = "INSERT INTO peca(razao_social, nome_fantasia, cnpj_cpf, inscricao_estadual, endereco, 
        bairro, complemento, numero, cidade, estado, telefone1, telefone2, observacao, ativo, email)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);+
        $stmt->bindValue(1,$dados_peca['razao_social']);
        $stmt->bindValue(2,$dados_peca['nome_fantasia']);
        $stmt->bindValue(3,$dados_peca['cnpj_cpf']);
        $stmt->bindValue(4,$dados_peca['inscricao_estadual']);
        $stmt->bindValue(5,$dados_peca['endereco']);
        $stmt->bindValue(6,$dados_peca['bairro']);
        $stmt->bindValue(7,$dados_peca['complemento']);
        $stmt->bindValue(8,$dados_peca['numero']);
        $stmt->bindValue(9,$dados_peca['cidade']);
        $stmt->bindValue(10,$dados_peca['estado']);
        $stmt->bindValue(11,$dados_peca['telefone1']);
        $stmt->bindValue(12,$dados_peca['telefone2']);
        $stmt->bindValue(13,$dados_peca['observacao']);
        $stmt->bindValue(14,$dados_peca['ativo']);
        $stmt->bindValue(15,$dados_peca['email']);
        $stmt->execute();
    }

    public function update($dados_peca) {
        $sql = "UPDATE peca SET razao_social = ?, nome_fantasia = ?, cnpj_cpf = ?, inscricao_estadual = ?, endereco = ?, bairro = ?, complemento = ?, numero = ?, cidade = ?, estado = ?, telefone1 = ?, telefone2 = ?, observacao = ?, ativo = ?, email = ? WHERE id = ?";
    
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_peca['razao_social']);
        $stmt->bindValue(2, $dados_peca['nome_fantasia']);
        $stmt->bindValue(3, $dados_peca['cnpj_cpf']);
        $stmt->bindValue(4, $dados_peca['inscricao_estadual']);
        $stmt->bindValue(5, $dados_peca['endereco']);
        $stmt->bindValue(6, $dados_peca['bairro']);
        $stmt->bindValue(7, $dados_peca['complemento']);
        $stmt->bindValue(8, $dados_peca['numero']);
        $stmt->bindValue(9, $dados_peca['cidade']);
        $stmt->bindValue(10, $dados_peca['estado']);
        $stmt->bindValue(11, $dados_peca['telefone1']);
        $stmt->bindValue(12, $dados_peca['telefone2']);
        $stmt->bindValue(13, $dados_peca['observacao']);
        $stmt->bindValue(14, $dados_peca['ativo']);
        $stmt->bindValue(15, $dados_peca['email']);
        $stmt->bindValue(16, $dados_peca['id']); 
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

        $arr_car = array();

        while($f = $stmt->fetchObject()){
            $arr_car[] = $f;
        }

        return $arr_car;
    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM peca WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

}