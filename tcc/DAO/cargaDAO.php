<?php

class CargaDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_carga){
        
        $sql = "INSERT INTO carga(cliente, produto, quantidade, valor_total, status)
        VALUES(?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);+
        $stmt->bindValue(1,$dados_carga['cliente']);
        $stmt->bindValue(2,$dados_carga['produto']);
        $stmt->bindValue(3,$dados_carga['quantidade']);
        $stmt->bindValue(4,$dados_carga['valor_total']);
        $stmt->bindValue(5,$dados_carga['status']);
        $stmt->execute();
    }

    public function update($dados_carga) {
        $sql = "UPDATE carga SET cliente = ?, produto = ?, quantidade = ?, valor_total = ?, status = ? WHERE id = ?";
    
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_carga['cliente']);
        $stmt->bindValue(2, $dados_carga['produto']);
        $stmt->bindValue(3, $dados_carga['quantidade']);
        $stmt->bindValue(4, $dados_carga['valor_total']);
        $stmt->bindValue(5, $dados_carga['status']);
        $stmt->bindValue(6, $dados_carga['id']); 
        $stmt->execute();
    }
    

    public function delete($id){
        $sql = "DELETE FROM carga where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM carga");
        $stmt->execute();

        $arr_car = array();

        while($f = $stmt->fetchObject()){
            $arr_car[] = $f;
        }

        return $arr_car;
    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM carga WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

}