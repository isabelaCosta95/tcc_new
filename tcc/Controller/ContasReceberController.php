<?php

class ContasReceberController{

    public static function index() {
        $contasReceber_DAO = new contasreceberDAO();
        $formas_pagamento = $contasReceber_DAO->getFormasPagamento(); 
    
        $filters = [
            'descricao' => $_GET['descricao'] ?? null,
            'dt_pagamento' => $_GET['dt_pagamento'] ?? null,
            'dt_vencimento' => $_GET['dt_vencimento'] ?? null,
            'stts' => $_GET['stts'] ?? null,
        ];
    
        $lista_rec = $contasReceber_DAO->getAllRows($filters);
        $total_rec= count($lista_rec);
    
        include 'View/modulos/contas_receber/listar_contasreceber.php';
    }
    

    public static function cadastrar() {
        $cliente_DAO = new ClienteDAO();
        $lista_cli = $cliente_DAO->getAllRows();
        $total_cli = count($lista_cli);
    
        $contasReceber_DAO = new contasreceberDAO();
        $formas_pagamento = $contasReceber_DAO->getFormasPagamento(); // Carrega as formas de pagamento
        $plano_contas = $contasReceber_DAO->getPlanoContas(); 

    
        include 'View/modulos/contas_receber/cadastrar_contasreceber.php';
    }
    

    public static function salvar(){
        $contasReceber_DAO = new contasreceberDAO();
    
        function formatarValorParaBanco($valor) {
            $valor = str_replace('R$', '', $valor);
            $valor = str_replace('.', '', $valor);
            $valor = str_replace(',', '.', $valor); 
            return $valor;
        }
    
        $valor_formatado = formatarValorParaBanco($_POST['valor']);
        
        $dados_para_salvar = array(
            'descricao' => $_POST['descricao'],
            'dt_vencimento' => $_POST['dt_vencimento'],
            'valor' => $valor_formatado,
            'stts' => $_POST['stts'],
            'dt_pagamento' => $_POST['dt_pagamento'],
            'form_pagamento' => $_POST['form_pagamento'],
            'plano_contas' => $_POST['plano_contas'],
            'observacao' => $_POST['observacao'],
            'qnt_parcelas' => $_POST['qnt_parcelas'],
            'cliente' => $_POST['cliente']
        );
            
        if(isset($_POST['id'])){
            $dados_para_salvar['id'] = $_POST['id'];
            $contasReceber_DAO->update($dados_para_salvar);
        }
        else{
            $contasReceber_DAO->insert($dados_para_salvar);
        }
        header('Location: /tcc/contasReceber');        
    }
    

    public static function excluir(){

        $contasReceber_DAO = new contasreceberDAO();
        $contasReceber_DAO->delete($_GET['id']);
        header("Location: /tcc/contasReceber");
    }

    public static function ver() {
        if (isset($_GET['id'])) {
            $contasReceber_DAO = new contasreceberDAO();
            $dados_receber = $contasReceber_DAO->getById($_GET['id']);
    
            $cliente_DAO = new ClienteDAO();
            $lista_cli = $cliente_DAO->getAllRows();
            $total_cli = count($lista_cli);
    
            $formas_pagamento = $contasReceber_DAO->getFormasPagamento(); 
            $plano_contas = $contasReceber_DAO->getPlanoContas(); 

    
            include 'View/modulos/contas_receber/cadastrar_contasreceber.php';
        } else {
            header("Location: /tcc/contasReceber");
        }
    }
    
}