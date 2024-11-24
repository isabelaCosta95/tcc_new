<?php

class PaleteController{

    public static function index(){

        $palete_DAO = new PaleteDAO();
        $lista_pal = $palete_DAO->getAllRows();
        $total_pal = count($lista_pal);
            
        include 'View/modulos/palete/lista_palete.php';
    }

    public static function cadastrar(){

        include 'View/modulos/palete/cadastrar_palete.php';
    }

    public static function salvar(){
        
        $palete_DAO = new PaleteDAO();
        $dados_para_salvar = array(
            'razao_social' => $_POST['razao_social'],
            'nome_fantasia' => $_POST['nome_fantasia'],
            'cnpj_cpf' => $_POST['cnpj_cpf'],
            'inscricao_estadual' => $_POST['inscricao_estadual'],
            'endereco' => $_POST['endereco'],
            'bairro' => $_POST['bairro'],
            'complemento' => $_POST['complemento'],
            'numero' => $_POST['numero'],
            'cidade' => $_POST['cidade'],
            'estado' => $_POST['estado'],
            'telefone1' => $_POST['telefone1'],
            'telefone2' => $_POST['telefone2'],
            'observacao' => $_POST['observacao'],
            'ativo' => $_POST['ativo'],
            'email' => $_POST['email']
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