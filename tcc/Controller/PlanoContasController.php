<?php

class PlanoContasController{

    public static function index(){

        $plano_contas_DAO = new PlanoContasDAO();
        $lista_plac = $plano_contas_DAO->getAllRows();
    
        $total_plac = count($lista_plac);
            
        include 'View/modulos/plano_contas/listar_plano_contas.php';
    }

    public static function cadastrar(){

        $categoria_DAO = new CategoriaDAO();
        $lista_categ = $categoria_DAO->getAllRows();
        $total_categ = count($lista_categ);

        $cliente_DAO = new ClienteDAO();
        $lista_cli = $cliente_DAO->getAllRows();
        $total_cli = count($lista_cli);

        $plano_contas_DAO = new PlanoContasDAO();

        include 'View/modulos/plano_contas/cadastrar_plano_contas.php';
    }

    public static function salvar(){

        $plano_contas_DAO = new PlanoContasDAO();
        $dados_para_salvar = array(
            'descricao' => $_POST['descricao'],
            'ativo' => $_POST['ativo'],
            'natureza' => $_POST['natureza'],
            'observacao' => $_POST['observacao'],
            'tipo' => $_POST['tipo']
        );
        
        if(isset($_POST['id'])){
            $dados_para_salvar['id'] = $_POST['id'];
            $plano_contas_DAO->update($dados_para_salvar);
        }
        else{
            $plano_contas_DAO->insert($dados_para_salvar);
        }      
        header('Location: /tcc/planoContas'); 
    }

    public static function excluir(){
        $plano_contas_DAO = new PlanoContasDAO();
        $plano_contas_DAO->delete($_GET['id']);
        header("Location: /tcc/planoContas");
    }

    public static function ver(){
        if(isset($_GET['id'])){
            $plano_contas_DAO = new PlanoContasDAO();
            $dados_plac = $plano_contas_DAO->getById($_GET['id']);
            
            $categoria_DAO = new CategoriaDAO();
            $lista_categ = $categoria_DAO->getAllRows();
            $total_categ = count($lista_categ);
    
            $cliente_DAO = new ClienteDAO();
            $lista_cli = $cliente_DAO->getAllRows();
            $total_cli = count($lista_cli);
            
            include 'View/modulos/plano_contas/cadastrar_plano_contas.php';
        
        } else {
            header("Location: /tcc/planoContas");
        }
    }
}