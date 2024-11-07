<?php

class ProdutoDAO{
    private $conexao;

    public function __construct(){

        include_once 'MySQL.php';
        $this->conexao = new MySQL();

    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM produto WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM produto");
        $stmt->execute();

        $arr_prod = array();

        while($f = $stmt->fetchObject()){
            $arr_prod[] = $f;
        }

        return $arr_prod;
    }

    public function insert($dados_produto){
        
        $sql = "INSERT INTO produto(id_categoria, id_fornecedor, descricao, preco)VALUES(?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_produto['id_categoria']);
        $stmt->bindValue(2,$dados_produto['id_fornecedor']);
        $stmt->bindValue(3,$dados_produto['descricao']);
        $stmt->bindValue(4,$dados_produto['preco']);
        $stmt->execute();
    }

    public function update($dados_produto){
        $sql = "UPDATE produto set id_categoria = ? , id_fornecedor = ?, descricao = ?, preco = ? where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_produto['id_categoria']);
        $stmt->bindValue(2,$dados_produto['id_fornecedor']);
        $stmt->bindValue(3,$dados_produto['descricao']);
        $stmt->bindValue(4,$dados_produto['preco']);
        $stmt->bindValue(5,$dados_produto['id']);

        $stmt->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM produto where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }
}