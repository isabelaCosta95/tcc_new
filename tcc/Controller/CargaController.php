<?php

class CargaController{

    public static function index(){

        $carga_DAO = new CargaDAO();
        $lista_car = $carga_DAO->getAllRows();
        $total_car = count($lista_car);
            
        include 'View/modulos/carga/lista_carga.php';
    }

    public static function cadastrar(){

        include 'View/modulos/carga/cadastrar_carga.php';
    }

    public static function salvar(){
        
        $carga_DAO = new CargaDAO();
        $dados_para_salvar = array(
            'cliente' => $_POST['cliente'],
            'produto' => $_POST['produto'],
            'quantidade' => $_POST['quantidade'],
            'valor_total' => $_POST['valor_total'],
            'status' => $_POST['status']
        );
        
        if(isset($_POST['id'])){
            $dados_para_salvar['id'] = $_POST['id'];
            $carga_DAO->update($dados_para_salvar);
        }
        else{
            $carga_DAO->insert($dados_para_salvar);
        }
        header('Location: /tcc/carga');        
    }

    public static function excluir(){
        $carga_DAO = new CargaDAO();
        $carga_DAO->delete($_GET['id']);
        header("Location: /tcc/carga");
    }

    public static function ver(){
        if(isset($_GET['id'])){
            $carga_DAO = new CargaDAO();
            $dados_car = $carga_DAO->getById($_GET['id']);
        
            include 'View/modulos/carga/cadastrar_carga.php';
        }
        else{
            header("Location: /tcc/carga");
        }
    }
}