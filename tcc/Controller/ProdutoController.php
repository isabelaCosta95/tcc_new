<?php

class ProdutoController{

    public static function index(){

        $produto_DAO = new ProdutoDAO();
        $lista_prod = $produto_DAO->getAllRows();
    
        $total_prod = count($lista_prod);
            
        include 'View/modulos/produto/lista_produto.php';
    }

    public static function cadastrar(){

        $categoria_DAO = new CategoriaDAO();
        $lista_categ = $categoria_DAO->getAllRows();
        $total_categ = count($lista_categ);

        $cliente_DAO = new ClienteDAO();
        $lista_cli = $cliente_DAO->getAllRows();
        $total_cli = count($lista_cli);

        include 'View/modulos/produto/cadastrar_produto.php';
    }

    public static function salvar(){

        $produto_DAO = new ProdutoDAO();
        $dados_para_salvar = array(
            'id_categoria' => $_POST['id_categoria'],
            'id_fornecedor' => $_POST['id_fornecedor'],
            'descricao' => $_POST['descricao'],
            'preco' => $_POST['preco']
        );
        
        if(isset($_POST['id'])){
            $dados_para_salvar['id'] = $_POST['id'];
            $produto_DAO->update($dados_para_salvar);
        }
        else{
            $produto_DAO->insert($dados_para_salvar);
        }      
        header('Location: /tcc/produto'); 
    }

    public static function excluir(){
        $produto_DAO = new ProdutoDAO();
        $produto_DAO->delete($_GET['id']);
        header("Location: /tcc/produto");
    }

    public static function ver(){
        if(isset($_GET['id'])){
            $produto_DAO = new ProdutoDAO();
            $dados_prod = $produto_DAO->getById($_GET['id']);
            
            $categoria_DAO = new CategoriaDAO();
            $lista_categ = $categoria_DAO->getAllRows();
            $total_categ = count($lista_categ);
    
            $cliente_DAO = new ClienteDAO();
            $lista_cli = $cliente_DAO->getAllRows();
            $total_cli = count($lista_cli);
            
            include 'View/modulos/produto/cadastrar_produto.php';
        
        } else {
            header("Location: /tcc/produto");
        }
    }
}