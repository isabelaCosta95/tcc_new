<?php

class ClienteController{

    public static function index(){

        $cliente_DAO = new ClienteDAO();
        $lista_cli = $cliente_DAO->getAllRows();
        $total_cli = count($lista_cli);
            
        include 'View/modulos/cliente/lista_cliente.php';
    }

    public static function cadastrar(){

        $estado_DAO = new EstadoDAO();
        $lista_estado = $estado_DAO->getAllRows();
        $total_estado = count($lista_estado);

        $cidade_DAO = new CidadeDAO();
        $lista_cidade = $cidade_DAO->getAllRows();
        $total_cidade = count($lista_cidade);

        include 'View/modulos/cliente/cadastrar_cliente.php';
    }

    public static function salvar(){
        
        $cliente_DAO = new ClienteDAO();
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
            $cliente_DAO->update($dados_para_salvar);
        }
        else{
            $cliente_DAO->insert($dados_para_salvar);
        }
        header('Location: /tcc/cliente');        
    }

    public static function excluir(){
        $cliente_DAO = new ClienteDAO();
        $cliente_DAO->delete($_GET['id']);
        header("Location: /tcc/cliente");
    }

    public static function ver(){
        if(isset($_GET['id'])){
            $cliente_DAO = new ClienteDAO();
            $dados_cli = $cliente_DAO->getById($_GET['id']);

            $estado_DAO = new EstadoDAO();
            $lista_estado = $estado_DAO->getAllRows();
            $total_estado = count($lista_estado);

            $cidade_DAO = new CidadeDAO();
            $lista_cidade = $cidade_DAO->getAllRows();
            $total_cidade = count($lista_cidade);
        
            include 'View/modulos/cliente/cadastrar_cliente.php';
        }
        else{
            header("Location: /tcc/cliente");
        }
    }
}