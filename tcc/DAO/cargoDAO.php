<?php

class CargoDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_cargo){
        
        $sql = "INSERT INTO cargo(nome, descricao)
        VALUES(?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_cargo['nome']);
        $stmt->bindValue(2,$dados_cargo['descricao']);
        $stmt->execute();
    }

    public function update($dados_cargo) {
        $sql = "UPDATE cargo SET nome = ?, descricao = ? WHERE id = ?";
    
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_cargo['nome']);
        $stmt->bindValue(2, $dados_cargo['descricao']);
        $stmt->bindValue(3, $dados_cargo['id']); 
        $stmt->execute();
    }
    

    public function delete($id){
        $sql = "DELETE FROM cargo where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM cargo");
        $stmt->execute();

        $arr_car = array();

        while($f = $stmt->fetchObject()){
            $arr_car[] = $f;
        }

        return $arr_car;
    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM cargo WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

}