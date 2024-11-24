<?php

class FormaPagamentoDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_forma_pagamento){
        
        $sql = "INSERT INTO forma_pagamento(descricao, ativo)VALUES(?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_forma_pagamento['descricao']);
        $stmt->bindValue(2,$dados_forma_pagamento['ativo']);
        $stmt->execute();
    }

    public function update($dados_forma_pagamento){
        $sql = "UPDATE forma_pagamento set descricao = ?, ativo = ? where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_forma_pagamento['descricao']);
        $stmt->bindValue(2,$dados_forma_pagamento['ativo']);
        $stmt->bindValue(3,$dados_forma_pagamento['id']);

        $stmt->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM forma_pagamento where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows(){
        $stmt = $this->conexao->prepare("SELECT * FROM forma_pagamento");
        $stmt->execute();

        $arr_forma_pagamento = array();

        while($f = $stmt->fetchObject()){
            $arr_forma_pagamento[] = $f;
        }

        return $arr_forma_pagamento;
    }

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM forma_pagamento WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

}