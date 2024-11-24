<?php

class PaleteDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_palete){
        
        $sql = "INSERT INTO palete(razao_social, nome_fantasia, cnpj_cpf, inscricao_estadual, endereco, 
        bairro, complemento, numero, cidade, estado, telefone1, telefone2, observacao, ativo, email)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);+
        $stmt->bindValue(1,$dados_palete['razao_social']);
        $stmt->bindValue(2,$dados_palete['nome_fantasia']);
        $stmt->bindValue(3,$dados_palete['cnpj_cpf']);
        $stmt->bindValue(4,$dados_palete['inscricao_estadual']);
        $stmt->bindValue(5,$dados_palete['endereco']);
        $stmt->bindValue(6,$dados_palete['bairro']);
        $stmt->bindValue(7,$dados_palete['complemento']);
        $stmt->bindValue(8,$dados_palete['numero']);
        $stmt->bindValue(9,$dados_palete['cidade']);
        $stmt->bindValue(10,$dados_palete['estado']);
        $stmt->bindValue(11,$dados_palete['telefone1']);
        $stmt->bindValue(12,$dados_palete['telefone2']);
        $stmt->bindValue(13,$dados_palete['observacao']);
        $stmt->bindValue(14,$dados_palete['ativo']);
        $stmt->bindValue(15,$dados_palete['email']);
        $stmt->execute();
    }

    public function update($dados_palete) {
        $sql = "UPDATE palete SET razao_social = ?, nome_fantasia = ?, cnpj_cpf = ?, inscricao_estadual = ?, endereco = ?, bairro = ?, complemento = ?, numero = ?, cidade = ?, estado = ?, telefone1 = ?, telefone2 = ?, observacao = ?, ativo = ?, email = ? WHERE id = ?";
    
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_palete['razao_social']);
        $stmt->bindValue(2, $dados_palete['nome_fantasia']);
        $stmt->bindValue(3, $dados_palete['cnpj_cpf']);
        $stmt->bindValue(4, $dados_palete['inscricao_estadual']);
        $stmt->bindValue(5, $dados_palete['endereco']);
        $stmt->bindValue(6, $dados_palete['bairro']);
        $stmt->bindValue(7, $dados_palete['complemento']);
        $stmt->bindValue(8, $dados_palete['numero']);
        $stmt->bindValue(9, $dados_palete['cidade']);
        $stmt->bindValue(10, $dados_palete['estado']);
        $stmt->bindValue(11, $dados_palete['telefone1']);
        $stmt->bindValue(12, $dados_palete['telefone2']);
        $stmt->bindValue(13, $dados_palete['observacao']);
        $stmt->bindValue(14, $dados_palete['ativo']);
        $stmt->bindValue(15, $dados_palete['email']);
        $stmt->bindValue(16, $dados_palete['id']); 
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

        $arr_car = array();

        while($f = $stmt->fetchObject()){
            $arr_car[] = $f;
        }

        return $arr_car;
    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM palete WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

}