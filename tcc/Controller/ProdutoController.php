<?php

class ProdutoController{

    public static function index(){

        $categoria_DAO = new CategoriaDAO();
        $lista_categ = $categoria_DAO->getAllRows();
        $total_categ = count($lista_categ);

        $produto_DAO = new ProdutoDAO();
        $lista_prod = $produto_DAO->getAllRows();
        $total_prod = count($lista_prod);
            
        include 'View/modulos/produto/listar_produto.php';
    }

    public static function cadastrar(){

        $categoria_DAO = new CategoriaDAO();
        $lista_categ = $categoria_DAO->getAllRows();
        $total_categ = count($lista_categ);

        $cliente_DAO = new ClienteDAO();
        $lista_cli = $cliente_DAO->getAllRows();
        $total_cli = count($lista_cli);

        $produto_DAO = new ProdutoDAO();
        $unidade_venda = $produto_DAO->getUnidadeVenda();

        include 'View/modulos/produto/cadastrar_produto.php';
    }

    public static function salvar(){

        $produto_DAO = new ProdutoDAO();
        $dados_para_salvar = array(
            'id_categoria' => $_POST['id_categoria'],
            'descricao' => $_POST['descricao'],
            'preco' => $_POST['preco'],
            'marca' => $_POST['marca'],
            'observacao' => $_POST['observacao'],
            'estoque' => $_POST['estoque'],
            'unidade' => $_POST['unidade'],
            'validade' => $_POST['validade'],
            'ativo' => $_POST['ativo'],
            'ncm' => $_POST['ncm'],
            'cfop' => $_POST['cfop'],
            'pis' => $_POST['pis'],
            'cofins' => $_POST['cofins'],
            'icms_cst' => $_POST['icms_cst'],
            'aliquota_pis' => $_POST['aliquota_pis'],
            'aliquota_cofins' => $_POST['aliquota_cofins'],
            'aliquota_icms' => $_POST['aliquota_icms'],
            'ipi' => $_POST['ipi'],
            'aliquota_reducao_bc' => $_POST['aliquota_reducao_bc'],
            'origem_icms' => $_POST['origem_icms'],
            'cest' => $_POST['cest'],
            'gtin' => $_POST['gtin'],
            'aliquota_mva' => $_POST['aliquota_mva'],
            'codigo_barras' => $_POST['codigo_barras']
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

            $unidade_venda = $produto_DAO->getUnidadeVenda();
            
            include 'View/modulos/produto/cadastrar_produto.php';
        
        } else {
            header("Location: /tcc/produto");
        }
    }
}