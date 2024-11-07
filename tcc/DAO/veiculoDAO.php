<?php

class VeiculoDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_veiculo){
        
        $sql = "INSERT INTO veiculo(nome_prop, marca_modelo, placa, rntc, chassi, renavam, cor, combustivel, 
        categoria, pot_cilindrada, estado, motor, carroceria, observacao, ativo)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_veiculo['nome_prop']);
        $stmt->bindValue(2,$dados_veiculo['marca_modelo']);
        $stmt->bindValue(3,$dados_veiculo['placa']);
        $stmt->bindValue(4,$dados_veiculo['rntc']);
        $stmt->bindValue(5,$dados_veiculo['chassi']);
        $stmt->bindValue(6,$dados_veiculo['renavam']);
        $stmt->bindValue(7,$dados_veiculo['cor']);
        $stmt->bindValue(8,$dados_veiculo['combustivel']);
        $stmt->bindValue(9,$dados_veiculo['categoria']);
        $stmt->bindValue(10,$dados_veiculo['pot_cilindrada']);
        $stmt->bindValue(11,$dados_veiculo['estado']);
        $stmt->bindValue(12,$dados_veiculo['motor']);
        $stmt->bindValue(13,$dados_veiculo['carroceria']);
        $stmt->bindValue(14,$dados_veiculo['observacao']);
        $stmt->bindValue(15,$dados_veiculo['ativo']);
        $stmt->execute();
    }

    public function update($dados_veiculo){
        $sql = "UPDATE veiculo set nome_prop = ?, marca_modelo = ?, placa = ?, rntc = ?, chassi = ?, 
        renavam = ?, cor = ?, combustivel = ?, categoria = ?, pot_cilindrada = ?, estado = ?,
        motor = ?, carroceria = ?, observacao = ?, ativo = ?  where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_veiculo['nome_prop']);
        $stmt->bindValue(2,$dados_veiculo['marca_modelo']);
        $stmt->bindValue(3,$dados_veiculo['placa']);
        $stmt->bindValue(4,$dados_veiculo['rntc']);
        $stmt->bindValue(5,$dados_veiculo['chassi']);
        $stmt->bindValue(6,$dados_veiculo['renavam']);
        $stmt->bindValue(7,$dados_veiculo['cor']);
        $stmt->bindValue(8,$dados_veiculo['combustivel']);
        $stmt->bindValue(9,$dados_veiculo['categoria']);
        $stmt->bindValue(10,$dados_veiculo['pot_cilindrada']);
        $stmt->bindValue(11,$dados_veiculo['estado']);
        $stmt->bindValue(12,$dados_veiculo['motor']);
        $stmt->bindValue(13,$dados_veiculo['carroceria']);
        $stmt->bindValue(14,$dados_veiculo['observacao']);
        $stmt->bindValue(15,$dados_veiculo['ativo']);
        $stmt->bindValue(16,$dados_veiculo['id']);
        $stmt->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM veiculo where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM veiculo");
        $stmt->execute();

        $arr_veiculo = array();

        while($f = $stmt->fetchObject()){
            $arr_veiculo[] = $f;
        }

        return $arr_veiculo;
    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM veiculo WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

}