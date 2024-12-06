<?php

class FormaPagamentoController{

    public static function index() {
        $forma_pagamento_DAO = new FormaPagamentoDAO();
        $lista_fpag = $forma_pagamento_DAO->getAllRows();
        $total_fpag = count($lista_fpag);
    
        // Verifica se é a primeira vez que a página é carregada na sessão
        if (!isset($_SESSION['janela_aberta'])) {
            $_SESSION['janela_aberta'] = true;
            $abrir_nova_janela = true; // Define para abrir a janela
        } else {
            $abrir_nova_janela = false; // Não abrir a janela novamente
        }
    
        include 'View/modulos/forma_pagamento/listar_formapagamento.php';
    }
    
    

    public static function cadastrar(){
        include 'View/modulos/forma_pagamento/cadastrar_formapagamento.php';
    }

    public static function salvar(){

        $forma_pagamento_DAO = new FormaPagamentoDAO();
        $dados_para_salvar = array(
            'descricao' => $_POST['descricao'],
            'ativo' => $_POST['ativo']
        );
            
        if(isset($_POST['id'])){
            $dados_para_salvar['id'] = $_POST['id'];
            $forma_pagamento_DAO->update($dados_para_salvar);
        }
        else{
            $forma_pagamento_DAO->insert($dados_para_salvar);
        }
        header('Location: /tcc/formaPagamento');        
    }

    public static function excluir(){
        $forma_pagamento_DAO = new FormaPagamentoDAO();
        $forma_pagamento_DAO->delete($_GET['id']);
        header("Location: /tcc/formaPagamento");
    }

    public static function ver(){
        if(isset($_GET['id'])){
            $forma_pagamento_DAO = new FormaPagamentoDAO();
            $dados_fpag = $forma_pagamento_DAO->getById($_GET['id']);
        
            include 'View/modulos/forma_pagamento/cadastrar_formapagamento.php';
        }
        else{
            header("Location: /tcc/formaPagamento");
        }
    }
}