<?php

class ViagemDAO {
    private $conexao;

    public function __construct() {
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_viagem) {
        $sql = "INSERT INTO viagem (dt_inicio, endereco_saida, veiculo, motorista, dt_fim, endereco_chegada, observacao) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_viagem['dt_inicio']);
        $stmt->bindValue(2, $dados_viagem['endereco_saida']);
        $stmt->bindValue(3, $dados_viagem['veiculo']);
        $stmt->bindValue(4, $dados_viagem['motorista']);
        $stmt->bindValue(5, $dados_viagem['dt_fim']);
        $stmt->bindValue(6, $dados_viagem['endereco_chegada']);
        $stmt->bindValue(7, $dados_viagem['observacao']);

        $stmt->execute();
    }

    public function update($dados_viagem) {
        $sql = "UPDATE viagem 
                SET dt_inicio = ?, endereco_saida = ?, veiculo = ?, motorista = ?, 
                    dt_fim = ?, endereco_chegada = ?, observacao = ? 
                WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_viagem['dt_inicio']);
        $stmt->bindValue(2, $dados_viagem['endereco_saida']);
        $stmt->bindValue(3, $dados_viagem['veiculo']);
        $stmt->bindValue(4, $dados_viagem['motorista']);
        $stmt->bindValue(5, $dados_viagem['dt_fim']);
        $stmt->bindValue(6, $dados_viagem['endereco_chegada']);
        $stmt->bindValue(7, $dados_viagem['observacao']);
        $stmt->bindValue(8, $dados_viagem['id']);

        $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM viagem WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public function getAllRows() {
        $stmt = $this->conexao->prepare("SELECT * FROM viagem");
        $stmt->execute();

        $arr_viagem = [];

        while ($f = $stmt->fetchObject()) {
            $arr_viagem[] = $f;
        }

        return $arr_viagem;
    }

    public function getById($id) {
        $stmt = $this->conexao->prepare("SELECT * FROM viagem WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();
    }
}