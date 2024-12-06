<?php
class PecasusadasDAO {
    private $conexao;

    public function __construct() {
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_parada) {
        $sql = "INSERT INTO pecas_usadas (peca, quantidade, valor_unitario) 
                VALUES (?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_parada['peca']);
        $stmt->bindValue(2, $dados_parada['quantidade']);
        $stmt->bindValue(3, $dados_parada['valor_unitario']);

        $stmt->execute();
    }
    
}
