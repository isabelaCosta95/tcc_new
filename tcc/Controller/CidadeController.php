<?php

class CidadeController{

    public static function index(){

        $cidade_DAO = new CidadeDAO();
        $lista_cidade = $cidade_DAO->getAllRows();
        $total_cidade = count($lista_cidade);
            
        include 'View/modulos/cidade/listar_cidade.php';
    }

    public static function cadastrar(){
        $estado_DAO = new EstadoDAO();
        $lista_estado = $estado_DAO->getAllRows();
        $total_estado = count($lista_estado);
        
        include 'View/modulos/cidade/cadastrar_cidade.php';
    }

    public static function salvar(){

        $cidade_DAO = new CidadeDAO();
        $dados_para_salvar = array(
            'descricao' => $_POST['descricao'],
            'id_estado' => $_POST['id_estado'],
            'ibge' => $_POST['ibge']

        );
            
        if(isset($_POST['id'])){
            $dados_para_salvar['id'] = $_POST['id'];
            $cidade_DAO->update($dados_para_salvar);
        }
        else{
            $cidade_DAO->insert($dados_para_salvar);
        }
        header('Location: /tcc/cidade');        
    }

    public static function excluir(){
        $cidade_DAO = new CidadeDAO();
        $cidade_DAO->delete($_GET['id']);
        header("Location: /tcc/cidade");
    }

    public static function ver(){
        if(isset($_GET['id'])){
            $estado_DAO = new EstadoDAO();
            $lista_estado = $estado_DAO->getAllRows();
            $total_estado = count($lista_estado);

            $cidade_DAO = new CidadeDAO();
            $dados_cidade = $cidade_DAO->getById($_GET['id']);
        
            include 'View/modulos/cidade/cadastrar_cidade.php';
        }
        else{
            header("Location: /tcc/cidade");
        }
    }
}