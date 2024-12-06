<?php

class ManutencaoDAO{
    private $conexao;

    public function __construct(){

        include_once 'MySQL.php';
        $this->conexao = new MySQL();

    }

    public function getLastInsertId()
    {
        return $this->conexao->lastInsertId(); 
    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM manutencao WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM manutencao");
        $stmt->execute();

        $arr_manut = array();

        while($f = $stmt->fetchObject()){
            $arr_manut[] = $f;
        }

        return $arr_manut;
    }

    public function insert($dados_manutencao) {
        try {
            $sql = "INSERT INTO manutencao (descricao, tipo, dt_manutencao, quilometragem, id_veiculo, valor, id_funcionario) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute([
                $dados_manutencao['descricao'],
                $dados_manutencao['tipo'],
                $dados_manutencao['dt_manutencao'],
                $dados_manutencao['quilometragem'],
                $dados_manutencao['id_veiculo'],
                $dados_manutencao['valor'],
                $dados_manutencao['id_funcionario']
            ]);
    
            return $this->conexao->lastInsertId(); // Retorna o ID do registro inserido
        } catch (PDOException $e) {
            echo "Erro ao inserir manutenção: " . $e->getMessage();
        }
    }
    

    public function update($dados_manutencao) {
        try {
            $sql = "UPDATE manutencao SET descricao = ?, tipo = ?, dt_manutencao = ?, quilometragem = ?, id_veiculo = ?, valor = ?, valor_total = ?, id_funcionario = ? WHERE id = ?";
            return $this->conexao->prepare($sql)->execute([
                $dados_manutencao['descricao'],
                $dados_manutencao['tipo'],
                $dados_manutencao['dt_manutencao'],
                $dados_manutencao['quilometragem'],
                $dados_manutencao['id_veiculo'],
                $dados_manutencao['valor'],
                $dados_manutencao['valor_total'],
                $dados_manutencao['id_funcionario'],
                $dados_manutencao['id']
            ]);
        } catch (PDOException $e) {
            echo "Erro ao atualizar manutenção: " . $e->getMessage();
            return false;
        }
    }
    
    public function delete($id){
        $sql = "DELETE FROM manutencao where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao excluir manutenção: " . $e->getMessage();
        }
    }

    
}