<?php

class PecaController{

    public static function index(){

        $peca_DAO = new PecaDAO();
        $lista_peca = $peca_DAO->getAllRows();
        $total_peca = count($lista_peca);
            
        include 'View/modulos/peca/listar_peca.php';
    }

    public static function cadastrar(){

        include 'View/modulos/peca/cadastrar_peca.php';
    }

    public static function salvar(){
        
        $peca_DAO = new PecaDAO();
        $dados_para_salvar = array(
            'descricao' => $_POST['descricao'],
            'ativo' => $_POST['ativo'],
            'observacao' => $_POST['observacao']
        );
        
        if(isset($_POST['id'])){
            $dados_para_salvar['id'] = $_POST['id'];
            $peca_DAO->update($dados_para_salvar);
        }
        else{
            $peca_DAO->insert($dados_para_salvar);
        }
        header('Location: /tcc/peca');        
    }

    public static function excluir(){
        $peca_DAO = new PecaDAO();
        $peca_DAO->delete($_GET['id']);
        header("Location: /tcc/peca");
    }

    public static function ver(){
        if(isset($_GET['id'])){
            $peca_DAO = new PecaDAO();
            $dados_peca = $peca_DAO->getById($_GET['id']);
        
            include 'View/modulos/peca/cadastrar_peca.php';
        }
        else{
            header("Location: /tcc/peca");
        }
    }
}