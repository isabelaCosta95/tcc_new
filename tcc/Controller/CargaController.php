<?php

class CargaController
{

    public static function index()
    {
        $carga_DAO = new CargaDAO();
        $lista_car = $carga_DAO->getAllRows();
        $total_car = count($lista_car);

        include 'View/modulos/carga/listar_carga.php';
    }

    public static function cadastrar()
    {
        $produto_DAO = new ProdutoDAO();
        $lista_prod = $produto_DAO->getAllRows();
        $total_prod = count($lista_prod);

        $cliente_DAO = new ClienteDAO();
        $lista_cli = $cliente_DAO->getAllRows();
        $total_cli = count($lista_cli);

        $seguradora_DAO = new SeguradoraDAO();
        $lista_seg = $seguradora_DAO->getAllRows();
        $total_seg = count($lista_seg);

        include 'View/modulos/carga/cadastrar_carga.php';
    }

    public static function salvar()
    {
        $carga_DAO = new CargaDAO();
        $dados_para_salvar = array(
            'id_cliente' => $_POST['id_cliente'],
            'id_produto' => $_POST['id_produto'],
            'quantidade' => $_POST['quantidade'],
            'valor_total' => $_POST['valor_total'],
            'status' => $_POST['status'],
            'id_seguradora' => $_POST['id_seguradora'],
            'nmr_seguro' => $_POST['nmr_seguro'],
            'descricao' => $_POST['descricao'],
        );

        if (isset($_POST['id'])) {
            $dados_para_salvar['id'] = $_POST['id'];
            $carga_DAO->update($dados_para_salvar);
        } else {
            $carga_DAO->insert($dados_para_salvar);
        }

        //Gerar contas a Receber
        $receber_DAO = new contasreceberDAO();

        $dados_para_salvar_rc = array(
            'descricao' => 'Carga: '. $_POST['descricao'],
            'dt_vencimento' => date('Y-m-d', strtotime('+1 month')),
            'valor' => $_POST['valor_total'],
            'stts' => 'A',
            'dt_pagamento' => NULL,
            'form_pagamento' => NULL,
            'plano_contas' => NULL,
            'observacao' => NULL,
            'qnt_parcelas' => 1,
            'cliente' => $_POST['id_cliente']
        );

        $receber_DAO->insert($dados_para_salvar_rc);
        header('Location: /tcc/carga');
    }

    public static function excluir()
    {
        $carga_DAO = new CargaDAO();
        $carga_DAO->delete($_GET['id']);
        header("Location: /tcc/carga");
    }

    public static function ver(){
        if(isset($_GET['id'])){
            $carga_DAO = new CargaDAO();
            $dados_car = $carga_DAO->getById($_GET['id']);       
                
            $produto = new ProdutoDAO();
            $lista_prod = $produto->getAllRows();
            $total_prod = count($lista_prod);
    
            $cliente_DAO = new ClienteDAO();
            $lista_cli = $cliente_DAO->getAllRows();
            $total_cli = count($lista_cli);
    
            $seguradora_DAO = new SeguradoraDAO();
            $lista_seg = $seguradora_DAO->getAllRows();
            $total_seg = count($lista_seg);
    
            // Obter a descrição da carga
            $descricaoCarga = $dados_car->descricao;
    
            // Buscar o ID da conta a receber usando o método buscarConta e passando a descrição
            $idConta = CargaDAO::buscarConta($descricaoCarga);
            
            // Passar a variável $idConta para a view
            include 'View/modulos/carga/cadastrar_carga.php';
        } else {
            header("Location: /tcc/carga");
        }
    }
    
    

}
