<?php

class CargaDAO
{
    private $conexao;

    public function __construct()
    {
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_carga)
    {
        $sql = "INSERT INTO carga(id_cliente, id_produto, quantidade, valor_total, status, id_seguradora, nmr_seguro, descricao)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        +$stmt->bindValue(1, $dados_carga['id_cliente']);
        $stmt->bindValue(2, $dados_carga['id_produto']);
        $stmt->bindValue(3, $dados_carga['quantidade']);
        $stmt->bindValue(4, $dados_carga['valor_total']);
        $stmt->bindValue(5, $dados_carga['status']);
        $stmt->bindValue(6, $dados_carga['id_seguradora']);
        $stmt->bindValue(7, $dados_carga['nmr_seguro']);
        $stmt->bindValue(8, $dados_carga['descricao']);

        $stmt->execute();
    }

    public function update($dados_carga)
    {
        $sql = "UPDATE carga SET id_cliente = ?, id_produto = ?, quantidade = ?, valor_total = ?, status = ?, id_seguradora = ?, nmr_seguro = ?, descricao = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_carga['id_cliente']);
        $stmt->bindValue(2, $dados_carga['id_produto']);
        $stmt->bindValue(3, $dados_carga['quantidade']);
        $stmt->bindValue(4, $dados_carga['valor_total']);
        $stmt->bindValue(5, $dados_carga['status']);
        $stmt->bindValue(6, $dados_carga['id_seguradora']);
        $stmt->bindValue(7, $dados_carga['nmr_seguro']);
        $stmt->bindValue(8, $dados_carga['descricao']);
        $stmt->bindValue(9, $dados_carga['id']);
        $stmt->execute();
    }


    public function delete($id)
    {
        $sql = "DELETE FROM carga where id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public function getAllRows()
    {
        $stmt = $this->conexao->prepare("SELECT * FROM carga");
        $stmt->execute();

        $arr_car = array();

        while ($f = $stmt->fetchObject()) {
            $arr_car[] = $f;
        }

        return $arr_car;
    }

    public function getById($id)
    {
        $stmt = $this->conexao->prepare("SELECT * FROM carga WHERE id=?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    public static function buscarConta($descricao)
    {
        // Criar uma instância da classe CargaDAO para acessar a conexão
        $dao = new CargaDAO();

        // A consulta agora utiliza LIKE para buscar na descrição
        $sql = "SELECT id FROM contas_receber WHERE descricao LIKE ?";
    
        $stmt = $dao->conexao->prepare($sql);
        $stmt->bindValue(1, '%' . $descricao . '%');  // O % é usado para fazer a correspondência parcial com LIKE
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Retorna o ID da conta a receber ou null se não existir
        return $result ? $result['id'] : null;
    }

}
