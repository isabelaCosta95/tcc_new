<?php

class EmpresaController{

    public static function index(){

        $empresa_DAO = new EmpresaDAO();
        $lista_emp = $empresa_DAO->getAllRows();
    
        $total_emp = count($lista_emp);
            
        include 'View/modulos/empresa/listar_empresa.php';
    }

    public static function cadastrar(){
        include 'View/modulos/empresa/cadastrar_empresa.php';
    }

    public static function salvar(){

        $empresa_DAO = new EmpresaDAO();
        $dados_para_salvar = array(
            //Adicionar
        );
        
        if(isset($_POST['id'])){
            $dados_para_salvar['id'] = $_POST['id'];
            $empresa_DAO->update($dados_para_salvar);
        }
        else{
            $empresa_DAO->insert($dados_para_salvar);
        }      
        header('Location: /tcc/empresa'); 
    }

    public static function excluir(){
        $empresa_DAO = new EmpresaDAO();
        $empresa_DAO->delete($_GET['id']);
        header("Location: /tcc/empresa");
    }

    public static function ver(){
        if(isset($_GET['id'])){
            $empresa_DAO = new EmpresaDAO();
            $dados_emp = $empresa_DAO->getById($_GET['id']);
            
            $veiculo_DAO = new VeiculoDAO();
            $lista_veic = $veiculo_DAO->getAllRows();
            $total_veic = count($lista_veic);
    
            include 'View/modulos/empresa/cadastrar_empresa.php';
        
        } else {
            header("Location: /tcc/empresa");
        }
    }
}