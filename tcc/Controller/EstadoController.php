<?php

class EstadoController{

    public static function index(){

        $estado_DAO = new EstadoDAO();
        $lista_estado = $estado_DAO->getAllRows();
        $total_estado = count($lista_estado);
            
        include 'View/modulos/estado/lista_estado.php';
    }

    public static function cadastrar(){
        include 'View/modulos/estado/cadastrar_estado.php';
    }

    public static function salvar(){

        $estado_DAO = new EstadoDAO();
        $dados_para_salvar = array(
            'descricao' => $_POST['descricao']
        );
            
        if(isset($_POST['id'])){
            $dados_para_salvar['id'] = $_POST['id'];
            $estado_DAO->update($dados_para_salvar);
        }
        else{
            $estado_DAO->insert($dados_para_salvar);
        }
        header('Location: /tcc/estado');        
    }

    public static function excluir(){
        $estado_DAO = new EstadoDAO();
        $estado_DAO->delete($_GET['id']);
        header("Location: /tcc/estado");
    }

    public static function ver(){
        if(isset($_GET['id'])){
            $estado_DAO = new estadoDAO();
            $dados_estado = $estado_DAO->getById($_GET['id']);
        
            include 'View/modulos/estado/cadastrar_estado.php';
        }
        else{
            header("Location: /tcc/estado");
        }
    }
}