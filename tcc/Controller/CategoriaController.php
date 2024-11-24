<?php

class CategoriaController{

    public static function index(){

        $categoria_DAO = new CategoriaDAO();
        $lista_categ = $categoria_DAO->getAllRows();
        $total_categ = count($lista_categ);
            
        include 'View/modulos/categoria/lista_categoria.php';
    }

    public static function cadastrar(){
        include 'View/modulos/categoria/cadastrar_categoria.php';
    }

    public static function salvar(){

        $categoria_DAO = new CategoriaDAO();
        $dados_para_salvar = array(
            'descricao' => $_POST['descricao'],
            'ativo' => $_POST['ativo']
        );
            
        if(isset($_POST['id'])){
            $dados_para_salvar['id'] = $_POST['id'];
            $categoria_DAO->update($dados_para_salvar);
        }
        else{
            $categoria_DAO->insert($dados_para_salvar);
        }
        header('Location: /tcc/categoria');        
    }

    public static function excluir(){
        $categoria_DAO = new CategoriaDAO();
        $categoria_DAO->delete($_GET['id']);
        header("Location: /tcc/categoria");
    }

    public static function ver(){
        if(isset($_GET['id'])){
            $categoria_DAO = new CategoriaDAO();
            $dados_categ = $categoria_DAO->getById($_GET['id']);
        
            include 'View/modulos/categoria/cadastrar_categoria.php';
        }
        else{
            header("Location: /tcc/categoria");
        }
    }
}