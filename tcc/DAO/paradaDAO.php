<?php
class ParadaDAO {
    private $conexao;

    public function __construct() {
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_parada) {
        $sql = "INSERT INTO parada (parada, local, valor_unitario, id_viagem) 
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_parada['parada']);
        $stmt->bindValue(2, $dados_parada['local']);
        $stmt->bindValue(3, $dados_parada['valor_unitario']);
        $stmt->bindValue(4, $dados_parada['id_viagem']);

        $stmt->execute();
    }
    
}
