<?php

class PecaController{

    public static function index(){

        $peca_DAO = new PecaDAO();
        $lista_peca = $peca_DAO->getAllRows();
        $total_peca = count($lista_peca);
            
        include 'View/modulos/peca/lista_peca.php';
    }

    public static function cadastrar(){

        include 'View/modulos/peca/cadastrar_peca.php';
    }

    public static function salvar(){
        
        $peca_DAO = new PecaDAO();
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
            $peca_DAO->update($dados_para_salvar);
        }
        else{
            $peca_DAO->insert($dados_para_salvar);
        }
        header('Location: /tcc/peca');        
    }

    public static function excluir(){
        $peca_DAO = new PecaDAO();
        $peca_DAO->delete($_GET['id']);
        header("Location: /tcc/peca");
    }

    public static function ver(){
        if(isset($_GET['id'])){
            $peca_DAO = new PecaDAO();
            $dados_peca = $peca_DAO->getById($_GET['id']);
        
            include 'View/modulos/peca/cadastrar_peca.php';
        }
        else{
            header("Location: /tcc/peca");
        }
    }
}