<?php

class FuncionarioDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_funcionario){
        
        $sql = "INSERT INTO funcionario(nome_completo, cpf, rg, dt_nasc, cnh, dt_venc_cnh, endereco, 
        bairro, complemento, numero, cidade, estado, telefone, chave_pix, observacao, ativo, email)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_funcionario['nome_completo']);
        $stmt->bindValue(2,$dados_funcionario['cpf']);
        $stmt->bindValue(3,$dados_funcionario['rg']);
        $stmt->bindValue(4,$dados_funcionario['dt_nasc']);
        $stmt->bindValue(5,$dados_funcionario['cnh']);
        $stmt->bindValue(6,$dados_funcionario['dt_venc_cnh']);
        $stmt->bindValue(7,$dados_funcionario['endereco']);
        $stmt->bindValue(8,$dados_funcionario['bairro']);
        $stmt->bindValue(9,$dados_funcionario['complemento']);
        $stmt->bindValue(10,$dados_funcionario['numero']);
        $stmt->bindValue(11,$dados_funcionario['cidade']);
        $stmt->bindValue(12,$dados_funcionario['estado']);
        $stmt->bindValue(13,$dados_funcionario['telefone']);
        $stmt->bindValue(14,$dados_funcionario['chave_pix']);
        $stmt->bindValue(15,$dados_funcionario['observacao']);
        $stmt->bindValue(16,$dados_funcionario['ativo']);
        $stmt->bindValue(17,$dados_funcionario['email']);
        $stmt->execute();
    }

    public function update($dados_funcionario) {
        $sql = "UPDATE funcionario SET nome_completo = ?, cpf = ?, rg = ?, dt_nasc = ?, cnh = ?, 
        dt_venc_cnh = ?, endereco = ?, bairro = ?, complemento = ?, numero = ?, cidade = ?, estado = ?, 
        telefone = ?, chave_pix = ?, observacao = ?, ativo = ?, email = ? WHERE id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_funcionario['nome_completo']);
        $stmt->bindValue(2, $dados_funcionario['cpf']);
        $stmt->bindValue(3, $dados_funcionario['rg']);
        $stmt->bindValue(4, $dados_funcionario['dt_nasc']);
        $stmt->bindValue(5, $dados_funcionario['cnh']);
        $stmt->bindValue(6, $dados_funcionario['dt_venc_cnh']);
        $stmt->bindValue(7, $dados_funcionario['endereco']);
        $stmt->bindValue(8, $dados_funcionario['bairro']);
        $stmt->bindValue(9, $dados_funcionario['complemento']);
        $stmt->bindValue(10, $dados_funcionario['numero']);
        $stmt->bindValue(11, $dados_funcionario['cidade']);
        $stmt->bindValue(12, $dados_funcionario['estado']);
        $stmt->bindValue(13, $dados_funcionario['telefone']);
        $stmt->bindValue(14, $dados_funcionario['chave_pix']);
        $stmt->bindValue(15, $dados_funcionario['observacao']);
        $stmt->bindValue(16, $dados_funcionario['ativo']);
        $stmt->bindValue(17, $dados_funcionario['email']);
        $stmt->bindValue(18, $dados_funcionario['id']);
        $stmt->execute();
    }
    

    public function delete($id){
        $sql = "DELETE FROM funcionario where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM funcionario");
        $stmt->execute();

        $arr_func = array();

        while($f = $stmt->fetchObject()){
            $arr_func[] = $f;
        }

        return $arr_func;
    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM funcionario WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

}