<?php

class PlanoContasController{

    public static function index(){

        $plano_contas_DAO = new PlanoContasDAO();
        $lista_plac = $plano_contas_DAO->getAllRows();
    
        $total_plac = count($lista_plac);
            
        include 'View/modulos/plano_contas/lista_plano_contas.php';
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
            'aliquota_recucao_bc' => $_POST['aliquota_recucao_bc'],
            'origem_icms' => $_POST['origem_icms'],
            'cest' => $_POST['cest'],
            'gtin' => $_POST['gtin'],
            'aliquota_mva' => $_POST['aliquota_mva'],
            'codigo_barras' => $_POST['codigo_barras']
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