<?php

class VeiculoController {

    public static function index() {
        $veiculo_DAO = new VeiculoDAO();
        $lista_veiculo = $veiculo_DAO->getAllRows();
        $total_veiculo = count($lista_veiculo);
        
        include 'View/modulos/veiculo/listar_veiculo.php';
    }

    public static function cadastrar() {
        $estado_DAO = new EstadoDAO();
        $lista_estado = $estado_DAO->getAllRows();
        $total_estado = count($lista_estado);
        include 'View/modulos/veiculo/cadastrar_veiculo.php';
    }
    
    public static function salvar() {
        $veiculo_DAO = new VeiculoDAO();
        $dados_para_salvar = array(
            'nome_proprietario' => $_POST['nome_proprietario'],
            'marca' => $_POST['marca'],
            'placa' => $_POST['placa'],
            'rntc' => $_POST['rntc'],
            'chassi' => $_POST['chassi'],
            'renavam' => $_POST['renavam'],
            'cor' => $_POST['cor'],
            'combustivel' => $_POST['combustivel'],
            'dt_fabricacao' => $_POST['dt_fabricacao'],
            'dt_licenciamento' => $_POST['dt_licenciamento']
        );
        
        if (isset($_POST['id'])) {
            $dados_para_salvar['id'] = $_POST['id'];
            $veiculo_DAO->update($dados_para_salvar);
        } else {
            $veiculo_DAO->insert($dados_para_salvar);
        }
        header('Location: /tcc/veiculo');
        exit();
    }

    public static function excluir() {
        $veiculo_DAO = new VeiculoDAO();
        $veiculo_DAO->delete($_GET['id']);

        $estado_DAO = new EstadoDAO();
        $lista_estado = $estado_DAO->getAllRows();
        $total_estado = count($lista_estado);
        
        header("Location: /tcc/veiculo");
        exit();
    }

    public static function ver() {
        if (isset($_GET['id'])) {
            $veiculo_DAO = new VeiculoDAO();
            $dados_veiculo = $veiculo_DAO->getById($_GET['id']);

            $estado_DAO = new EstadoDAO();
            $lista_estado = $estado_DAO->getAllRows();
            $total_estado = count($lista_estado);
        
            include 'View/modulos/veiculo/cadastrar_veiculo.php';
        } else {
            header("Location: /tcc/veiculo");
            exit();
        }
    }
}
