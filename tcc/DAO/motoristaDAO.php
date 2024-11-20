<?php

class MotoristaDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_motorista){
        
        $sql = "INSERT INTO motorista(nome_completo, cpf, rg, dt_nasc, cnh, dt_venc_cnh, endereco, 
        bairro, complemento, numero, cidade, estado, telefone, chave_pix, observacao, ativo, email)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);+
        $stmt->bindValue(1,$dados_motorista['nome_completo']);
        $stmt->bindValue(2,$dados_motorista['cpf']);
        $stmt->bindValue(3,$dados_motorista['rg']);
        $stmt->bindValue(4,$dados_motorista['dt_nasc']);
        $stmt->bindValue(5,$dados_motorista['cnh']);
        $stmt->bindValue(6,$dados_motorista['dt_venc_cnh']);
        $stmt->bindValue(7,$dados_motorista['endereco']);
        $stmt->bindValue(8,$dados_motorista['bairro']);
        $stmt->bindValue(9,$dados_motorista['complemento']);
        $stmt->bindValue(10,$dados_motorista['numero']);
        $stmt->bindValue(11,$dados_motorista['cidade']);
        $stmt->bindValue(12,$dados_motorista['estado']);
        $stmt->bindValue(13,$dados_motorista['telefone']);
        $stmt->bindValue(14,$dados_motorista['chave_pix']);
        $stmt->bindValue(15,$dados_motorista['observacao']);
        $stmt->bindValue(16,$dados_motorista['ativo']);
        $stmt->bindValue(17,$dados_motorista['email']);
        $stmt->execute();
    }

    public function update($dados_motorista){
        $sql = "UPDATE motorista set nome_completo = ? , cpf = ? , rg = ? , dt_nasc = ?, cnh = ?, 
        dt_venc_cnh = ?, endereco = ?, bairro = ?, complemento = ?, numero = ?, cidade = ?, estado = ?
        telefone = ?, chave_pix = ?, observacao = ?, ativo = ?, email = ? where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_motorista['nome_completo']);
        $stmt->bindValue(2,$dados_motorista['cpf']);
        $stmt->bindValue(3,$dados_motorista['rg']);
        $stmt->bindValue(4,$dados_motorista['dt_nasc']);
        $stmt->bindValue(5,$dados_motorista['cnh']);
        $stmt->bindValue(6,$dados_motorista['dt_venc_cnh']);
        $stmt->bindValue(7,$dados_motorista['endereco']);
        $stmt->bindValue(8,$dados_motorista['bairro']);
        $stmt->bindValue(9,$dados_motorista['complemento']);
        $stmt->bindValue(10,$dados_motorista['numero']);
        $stmt->bindValue(11,$dados_motorista['cidade']);
        $stmt->bindValue(12,$dados_motorista['estado']);
        $stmt->bindValue(13,$dados_motorista['telefone']);
        $stmt->bindValue(14,$dados_motorista['chave_pix']);
        $stmt->bindValue(15,$dados_motorista['observacao']);
        $stmt->bindValue(16,$dados_motorista['ativo']);
        $stmt->bindValue(17,$dados_motorista['email']);
        $stmt->bindValue(18,$dados_motorista['id']);

        $stmt->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM motorista where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM motorista");
        $stmt->execute();

        $arr_mot = array();

        while($f = $stmt->fetchObject()){
            $arr_mot[] = $f;
        }

        return $arr_mot;
    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM motorista WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

}