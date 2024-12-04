<?php

class SeguradoraController{

    public static function index(){

        $seguradora_DAO = new SeguradoraDAO();
        $lista_seg = $seguradora_DAO->getAllRows();
        $total_seg = count($lista_seg);
            
        include 'View/modulos/seguradora/listar_seguradora.php';
    }

    public static function cadastrar(){

        include 'View/modulos/seguradora/cadastrar_seguradora.php';
    }

    public static function salvar(){
        
        $seguradora_DAO = new SeguradoraDAO();
        $dados_para_salvar = array(
            'nome' => $_POST['nome'],
            'contato' => $_POST['contato'],
            'cnpj' => $_POST['cnpj'],
            'inscricao_estadual' => $_POST['inscricao_estadual'],
            'telefone' => $_POST['telefone'],
            'email' => $_POST['email']
        );
        
        if(isset($_POST['id'])){
            $dados_para_salvar['id'] = $_POST['id'];
            $seguradora_DAO->update($dados_para_salvar);
        }
        else{
            $seguradora_DAO->insert($dados_para_salvar);
        }
        header('Location: /tcc/seguradora');        
    }

    public static function excluir(){
        $seguradora_DAO = new SeguradoraDAO();
        $seguradora_DAO->delete($_GET['id']);
        header("Location: /tcc/seguradora");
    }

    public static function ver(){
        if(isset($_GET['id'])){
            $seguradora_DAO = new SeguradoraDAO();
            $dados_seg = $seguradora_DAO->getById($_GET['id']);
        
            include 'View/modulos/seguradora/cadastrar_seguradora.php';
        }
        else{
            header("Location: /tcc/seguradora");
        }
    }
}