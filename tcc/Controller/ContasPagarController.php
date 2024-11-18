<?php

class ContasPagarController{

    public static function index() {
        $contasPagar_DAO = new contaspagarDAO();
    
        // Capturando filtros de consulta
        $filters = [
            'descricao' => $_GET['descricao'] ?? null,
            'dt_pagamento' => $_GET['dt_pagamento'] ?? null,
            'dt_vencimento' => $_GET['dt_vencimento'] ?? null,
            'form_pagamento' => $_GET['form_pagamento'] ?? null,
            'stts' => $_GET['stts'] ?? null,
        ];
    
        // Obtendo dados com filtros
        $lista_pag = $contasPagar_DAO->getAllRows($filters);
        $total_pag = count($lista_pag);
    
        $cliente_DAO = new ClienteDAO();
        $lista_cli = $cliente_DAO->getAllRows();
        $total_cli = count($lista_cli);
            
        include 'View/modulos/contas_pagar/lista_contaspagar.php';
    }
    

    public static function cadastrar() {
        $cliente_DAO = new ClienteDAO();
        $lista_cli = $cliente_DAO->getAllRows();
        $total_cli = count($lista_cli);
    
        $contasPagar_DAO = new contaspagarDAO();
        $formas_pagamento = $contasPagar_DAO->getFormasPagamento(); // Carrega as formas de pagamento
        $plano_contas = $contasPagar_DAO->getPlanoContas(); 

    
        include 'View/modulos/contas_pagar/cadastrar_contaspagar.php';
    }
    

    public static function salvar(){
        $contasPagar_DAO = new contaspagarDAO();
    
        // Função para formatar o valor
        function formatarValorParaBanco($valor) {
            // Remove o "R$" e substitui a vírgula por ponto
            $valor = str_replace('R$', '', $valor); // Remove "R$"
            $valor = str_replace('.', '', $valor);  // Remove ponto (milhares)
            $valor = str_replace(',', '.', $valor); // Substitui vírgula por ponto
            return $valor;
        }
    
        // Formatar o valor antes de salvar
        $valor_formatado = formatarValorParaBanco($_POST['valor']);
        
        $dados_para_salvar = array(
            'descricao' => $_POST['descricao'],
            'dt_vencimento' => $_POST['dt_vencimento'],
            'valor' => $valor_formatado, // Usar o valor formatado
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
            $contasPagar_DAO->update($dados_para_salvar);
        }
        else{
            $contasPagar_DAO->insert($dados_para_salvar);
        }
        header('Location: /tcc/contasPagar');        
    }
    

    public static function excluir(){

        $contasPagar_DAO = new contaspagarDAO();
        $contasPagar_DAO->delete($_GET['id']);
        header("Location: /tcc/contasPagar");
    }

    public static function ver() {
        if (isset($_GET['id'])) {
            $contasPagar_DAO = new contaspagarDAO();
            $dados_pagar = $contasPagar_DAO->getById($_GET['id']);
    
            $cliente_DAO = new ClienteDAO();
            $lista_cli = $cliente_DAO->getAllRows();
            $total_cli = count($lista_cli);
    
            $formas_pagamento = $contasPagar_DAO->getFormasPagamento(); 
            $plano_contas = $contasPagar_DAO->getPlanoContas(); 

    
            include 'View/modulos/contas_pagar/cadastrar_contaspagar.php';
        } else {
            header("Location: /tcc/contasPagar");
        }
    }
    
}