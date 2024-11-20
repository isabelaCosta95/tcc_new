<?php

class MotoristaController{

    public static function index(){

        $motorista_DAO = new MotoristaDAO();
        $lista_mot = $motorista_DAO->getAllRows();
        $total_mot = count($lista_mot);
            
        include 'View/modulos/motorista/lista_motorista.php';
    }

    public static function cadastrar(){

        $estado_DAO = new EstadoDAO();
        $lista_estado = $estado_DAO->getAllRows();
        $total_estado = count($lista_estado);

        $cidade_DAO = new CidadeDAO();
        $lista_cidade = $cidade_DAO->getAllRows();
        $total_cidade = count($lista_cidade);

        include 'View/modulos/motorista/cadastrar_motorista.php';
    }

    public static function salvar(){

        $motorista_DAO = new MotoristaDAO();
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
            $motorista_DAO->update($dados_para_salvar);
        }
        else{
            $motorista_DAO->insert($dados_para_salvar);
        }
        header('Location: /tcc/motorista');        
    }

    public static function excluir(){
        $motorista_DAO = new MotoristaDAO();
        $motorista_DAO->delete($_GET['id']);
        header("Location: /tcc/motorista");
    }

    public static function ver(){
        if(isset($_GET['id'])){
            $motorista_DAO = new MotoristaDAO();
            $dados_mot = $motorista_DAO->getById($_GET['id']);

            $estado_DAO = new EstadoDAO();
            $lista_estado = $estado_DAO->getAllRows();
            $total_estado = count($lista_estado);

            $cidade_DAO = new CidadeDAO();
            $lista_cidade = $cidade_DAO->getAllRows();
            $total_cidade = count($lista_cidade);
        
            include 'View/modulos/motorista/cadastrar_motorista.php';
        }
        else{
            header("Location: /tcc/motorista");
        }
    }
}