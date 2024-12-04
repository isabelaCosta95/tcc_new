<?php

class EmpresaController
{

    public static function index()
    {

        $empresa_DAO = new EmpresaDAO();
        $lista_emp = $empresa_DAO->getAllRows();
        $total_emp = count($lista_emp);

        include 'View/modulos/empresa/listar_empresa.php';
    }

    public static function cadastrar()
    {
        $estado_DAO = new EstadoDAO();
        $lista_estado = $estado_DAO->getAllRows();
        $total_estado = count($lista_estado);

        $cidade_DAO = new CidadeDAO();
        $lista_cidade = $cidade_DAO->getAllRows();
        $total_cidade = count($lista_cidade);

        include 'View/modulos/empresa/cadastrar_empresa.php';
    }

    public static function salvar()
    {

        $empresa_DAO = new EmpresaDAO();
        $dados_para_salvar = array(
            'razao_social' => $_POST['razao_social'],
            'nome_fantasia' => $_POST['nome_fantasia'],
            'email' => $_POST['email'],
            'telefone' => $_POST['telefone'],
            'inscricao_municipal' => $_POST['inscricao_municipal'],
            'cnpj' => $_POST['cnpj'],
            'inscricao_estadual' => $_POST['inscricao_estadual'],
            'endereco' => $_POST['endereco'],
            'bairro' => $_POST['bairro'],
            'id_cidade' => $_POST['id_cidade'],
            'numero' => $_POST['numero'],
            'complemento' => $_POST['complemento'],
            'id_estado' => $_POST['id_estado']
        );

        if (isset($_POST['id'])) {
            $dados_para_salvar['id'] = $_POST['id'];
            $empresa_DAO->update($dados_para_salvar);
        } else {
            $empresa_DAO->insert($dados_para_salvar);
        }
        header('Location: /tcc/empresa');
    }

    public static function excluir()
    {
        $empresa_DAO = new EmpresaDAO();
        $empresa_DAO->delete($_GET['id']);
        header("Location: /tcc/empresa");
    }

    public static function ver()
    {
        if (isset($_GET['id'])) {

            $estado_DAO = new EstadoDAO();
            $lista_estado = $estado_DAO->getAllRows();
            $total_estado = count($lista_estado);

            $cidade_DAO = new CidadeDAO();
            $lista_cidade = $cidade_DAO->getAllRows();
            $total_cidade = count($lista_cidade);

            $empresa_DAO = new EmpresaDAO();
            $dados_emp = $empresa_DAO->getById($_GET['id']);

            include 'View/modulos/empresa/cadastrar_empresa.php';
        } else {
            header("Location: /tcc/empresa");
        }
    }
}
