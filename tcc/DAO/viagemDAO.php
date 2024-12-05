<?php

class ViagemDAO
{
    private $conexao;

    public function __construct()
    {
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function getLastInsertId()
    {
        return $this->conexao->lastInsertId(); 
    }

    public function insert($dados_viagem)
    {
        $sql = "INSERT INTO viagem (data_inicio, endereco_partida, id_veiculo, id_funcionario, data_fim, endereco_chegada, observacao, id_carga) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql); 
        $stmt->bindValue(1, $dados_viagem['data_inicio']);
        $stmt->bindValue(2, $dados_viagem['endereco_partida']);
        $stmt->bindValue(3, $dados_viagem['id_veiculo']);
        $stmt->bindValue(4, $dados_viagem['id_funcionario']);
        $stmt->bindValue(5, $dados_viagem['data_fim']);
        $stmt->bindValue(6, $dados_viagem['endereco_chegada']);
        $stmt->bindValue(7, $dados_viagem['observacao']);
        $stmt->bindValue(8, $dados_viagem['id_carga']);

        try {
            $stmt->execute();
            return $this->conexao->lastInsertId(); 
        } catch (PDOException $e) {
            echo "Erro ao inserir viagem: " . $e->getMessage();
        }
    }

    public function update($dados_viagem)
    {
        $sql = "UPDATE viagem 
                SET data_inicio = ?, endereco_partida = ?, id_veiculo = ?, id_funcionario = ?, 
                    data_fim = ?, endereco_chegada = ?, observacao = ?, id_carga = ?
                WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_viagem['data_inicio']);
        $stmt->bindValue(2, $dados_viagem['endereco_partida']);
        $stmt->bindValue(3, $dados_viagem['id_veiculo']);
        $stmt->bindValue(4, $dados_viagem['id_funcionario']);
        $stmt->bindValue(5, $dados_viagem['data_fim']);
        $stmt->bindValue(6, $dados_viagem['endereco_chegada']);
        $stmt->bindValue(7, $dados_viagem['observacao']);
        $stmt->bindValue(8, $dados_viagem['id_carga']);
        $stmt->bindValue(9, $dados_viagem['id']);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao atualizar viagem: " . $e->getMessage();
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM viagem WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao excluir viagem: " . $e->getMessage();
        }
    }

    public function getAllRows()
    {
        $stmt = $this->conexao->prepare("SELECT * FROM viagem");

        try {
            $stmt->execute();
            $arr_viagem = [];
            while ($f = $stmt->fetchObject()) {
                $arr_viagem[] = $f;
            }
            return $arr_viagem;
        } catch (PDOException $e) {
            echo "Erro ao buscar viagens: " . $e->getMessage();
        }
    }

    public function getById($id)
    {
        $stmt = $this->conexao->prepare("SELECT * FROM viagem WHERE id = ?");
        $stmt->bindValue(1, $id);

        try {
            $stmt->execute();
            return $stmt->fetchObject();
        } catch (PDOException $e) {
            echo "Erro ao buscar viagem por ID: " . $e->getMessage();
        }
    }

    public function cadastraConta(){

    }
}
