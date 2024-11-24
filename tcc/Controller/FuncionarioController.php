<?php

class FuncionarioController{

    public static function index(){

        $funcionario_DAO = new FuncionarioDAO();
        $lista_func = $funcionario_DAO->getAllRows();
        $total_func = count($lista_func);
            
        include 'View/modulos/funcionario/listar_funcionario.php';
    }

    public static function cadastrar(){

        $estado_DAO = new EstadoDAO();
        $lista_estado = $estado_DAO->getAllRows();
        $total_estado = count($lista_estado);

        $cidade_DAO = new CidadeDAO();
        $lista_cidade = $cidade_DAO->getAllRows();
        $total_cidade = count($lista_cidade);

        include 'View/modulos/funcionario/cadastrar_funcionario.php';
    }

    public static function salvar(){

        $funcionario_DAO = new FuncionarioDAO();
        $dados_para_salvar = array(
            'nome_completo' => $_POST['nome_completo'],
            'cpf' => $_POST['cpf'],
            'rg' => $_POST['rg'],
            'cnh' => $_POST['cnh'],
            'dt_venc_cnh' => $_POST['dt_venc_cnh'],
            'dt_nasc' => $_POST['dt_nasc'],
            'endereco' => $_POST['endereco'],
            'bairro' => $_POST['bairro'],
            'complemento' => $_POST['complemento'],
            'numero' => $_POST['numero'],
            'cidade' => $_POST['cidade'],
            'estado' => $_POST['estado'],
            'telefone' => $_POST['telefone'],
            'chave_pix' => $_POST['chave_pix'],
            'observacao' => $_POST['observacao'],
            'ativo' => $_POST['ativo'],
            'email' => $_POST['email']
        );
        
        if(isset($_POST['id'])){
            $dados_para_salvar['id'] = $_POST['id'];
            $funcionario_DAO->update($dados_para_salvar);
        }
        else{
            $funcionario_DAO->insert($dados_para_salvar);
        }
        header('Location: /tcc/funcionario');        
    }

    public static function excluir(){
        $funcionario_DAO = new FuncionarioDAO();
        $funcionario_DAO->delete($_GET['id']);
        header("Location: /tcc/funcionario");
    }

    public static function ver(){
        if(isset($_GET['id'])){
            $funcionario_DAO = new FuncionarioDAO();
            $dados_func = $funcionario_DAO->getById($_GET['id']);

            $estado_DAO = new EstadoDAO();
            $lista_estado = $estado_DAO->getAllRows();
            $total_estado = count($lista_estado);

            $cidade_DAO = new CidadeDAO();
            $lista_cidade = $cidade_DAO->getAllRows();
            $total_cidade = count($lista_cidade);
        
            include 'View/modulos/funcionario/cadastrar_funcionario.php';
        }
        else{
            header("Location: /tcc/funcionario");
        }
    }
}