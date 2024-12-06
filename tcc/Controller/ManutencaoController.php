<?php

class ManutencaoController{

    public static function index(){

        $manutencao_DAO = new ManutencaoDAO();
        $lista_manut = $manutencao_DAO->getAllRows();
    
        $total_manut = count($lista_manut);
            
        include 'View/modulos/manutencao/listar_manutencao.php';
    }

    public static function cadastrar(){

        $veiculo_DAO = new VeiculoDAO();
        $lista_veic = $veiculo_DAO->getAllRows();
        $total_veic = count($lista_veic);

        include 'View/modulos/manutencao/cadastrar_manutencao.php';
    }

    public static function salvar(){

        $manutencao_DAO = new ManutencaoDAO();
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
            $manutencao_DAO->update($dados_para_salvar);
        }
        else{
            $manutencao_DAO->insert($dados_para_salvar);
        }      
        header('Location: /tcc/manutencao'); 
    }

    public static function excluir(){
        $manutencao_DAO = new ManutencaoDAO();
        $manutencao_DAO->delete($_GET['id']);
        header("Location: /tcc/manutencao");
    }

    public static function ver(){
        if(isset($_GET['id'])){
            $manutencao_DAO = new ManutencaoDAO();
            $dados_manut = $manutencao_DAO->getById($_GET['id']);
            
            $veiculo_DAO = new VeiculoDAO();
            $lista_veic = $veiculo_DAO->getAllRows();
            $total_veic = count($lista_veic);
    
            include 'View/modulos/manutencao/cadastrar_manutencao.php';
        
        } else {
            header("Location: /tcc/manutencao");
        }
    }
}