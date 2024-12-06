<?php

class contasreceberDAO{
    private $conexao;

    public function __construct(){
        include_once "MySQL.php";
        $this->conexao = new MySQL();
    }

    public function insert($dados_receber){
        
        $sql = "INSERT INTO contas_receber(descricao, dt_vencimento, valor, stts, dt_pagamento, form_pagamento, plano_contas, observacao, qnt_parcelas, cliente)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_receber['descricao']);
        $stmt->bindValue(2,$dados_receber['dt_vencimento']);
        $stmt->bindValue(3,$dados_receber['valor']);
        $stmt->bindValue(4,$dados_receber['stts']);
        $stmt->bindValue(5,$dados_receber['dt_pagamento']);
        $stmt->bindValue(6,$dados_receber['form_pagamento']);
        $stmt->bindValue(7,$dados_receber['plano_contas']);
        $stmt->bindValue(8,$dados_receber['observacao']);
        $stmt->bindValue(9,$dados_receber['qnt_parcelas']);
        $stmt->bindValue(10,$dados_receber['cliente']);
        $stmt->execute();
    }

    public function update($dados_receber){
        $sql = "UPDATE contas_receber set descricao = ?, dt_vencimento= ?, valor = ?, stts = ?, dt_pagamento = ?, form_pagamento = ?, plano_contas = ?, observacao = ?, qnt_parcelas = ? , cliente = ? where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$dados_receber['descricao']);
        $stmt->bindValue(2,$dados_receber['dt_vencimento']);
        $stmt->bindValue(3,$dados_receber['valor']);
        $stmt->bindValue(4,$dados_receber['stts']);
        $stmt->bindValue(5,$dados_receber['dt_pagamento']);
        $stmt->bindValue(6,$dados_receber['form_pagamento']);
        $stmt->bindValue(7,$dados_receber['plano_contas']);
        $stmt->bindValue(8,$dados_receber['observacao']);
        $stmt->bindValue(9,$dados_receber['qnt_parcelas']);
        $stmt->bindValue(10,$dados_receber['cliente']);
        $stmt->bindValue(11,$dados_receber['id']);

        $stmt->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM contas_receber where id = ?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }

    public function getAllRows($filters = []) {
        $sql = "SELECT * FROM contas_receber WHERE 1=1";
        
        // Adicionando condições baseadas nos filtros
        if (!empty($filters['descricao'])) {
            $sql .= " AND descricao LIKE :descricao";
        }
        if (!empty($filters['dt_pagamento'])) {
            $sql .= " AND dt_pagamento = :dt_pagamento";
        }
        if (!empty($filters['dt_vencimento'])) {
            $sql .= " AND dt_vencimento = :dt_vencimento";
        }
        if (!empty($filters['form_pagamento'])) {
            $sql .= " AND form_pagamento LIKE :form_pagamento";
        }
        if (!empty($filters['stts'])) {
            $sql .= " AND stts = :stts";
        }
    
        $stmt = $this->conexao->prepare($sql);
    
        // Vinculando parâmetros
        if (!empty($filters['descricao'])) {
            $stmt->bindValue(':descricao', "%{$filters['descricao']}%");
        }
        if (!empty($filters['dt_pagamento'])) {
            $stmt->bindValue(':dt_pagamento', $filters['dt_pagamento']);
        }
        if (!empty($filters['dt_vencimento'])) {
            $stmt->bindValue(':dt_vencimento', $filters['dt_vencimento']);
        }
        if (!empty($filters['form_pagamento'])) {
            $stmt->bindValue(':form_pagamento', "%{$filters['form_pagamento']}%");
        }
        if (!empty($filters['stts'])) {
            $stmt->bindValue(':stts', $filters['stts']);
        }
    
        $stmt->execute();
    
        $arr_contasreceber = array();
        while ($p = $stmt->fetchObject()) {
            $arr_contasreceber[] = $p;
        }
    
        return $arr_contasreceber;
    }
    

    public function getById($id){
        $stmt = $this->conexao->prepare("SELECT * FROM contas_receber WHERE id=?");
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchObject();

    }

    public function getFormasPagamento() {
        $sql = "SELECT id, descricao FROM forma_pagamento";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna um array com os dados
    }
    
    public function getPlanoContas() {
        $sql = "SELECT id, descricao FROM plano_conta";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna um array com os dados
    }

}

