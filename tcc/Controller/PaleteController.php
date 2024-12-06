<?php

class PaleteController{

    public static function index(){

        $palete_DAO = new PaleteDAO();
        $lista_pal = $palete_DAO->getAllRows();
        $total_pal = count($lista_pal);

        $soma_paletes = $palete_DAO->somarPaletes();
            
        include 'View/modulos/palete/listar_palete.php';
    }

    public static function cadastrar(){

        include 'View/modulos/palete/cadastrar_palete.php';
    }

    public static function salvar(){
        
        $palete_DAO = new PaleteDAO();
        $dados_para_salvar = array(
            'tipo' => $_POST['tipo'],
            'quantidade' => $_POST['quantidade'],
            'justificativa' => $_POST['justificativa']
        );
        
        if(isset($_POST['id'])){
            $dados_para_salvar['id'] = $_POST['id'];
            $palete_DAO->update($dados_para_salvar);
        }
        else{
            $palete_DAO->insert($dados_para_salvar);
        }
        header('Location: /tcc/palete');        
    }

    public static function excluir(){
        $palete_DAO = new PaleteDAO();
        $palete_DAO->delete($_GET['id']);
        header("Location: /tcc/palete");
    }

    public static function ver(){
        if(isset($_GET['id'])){
            $palete_DAO = new PaleteDAO();
            $dados_pal = $palete_DAO->getById($_GET['id']);
        
            include 'View/modulos/palete/cadastrar_palete.php';
        }
        else{
            header("Location: /tcc/palete");
        }
    }
}