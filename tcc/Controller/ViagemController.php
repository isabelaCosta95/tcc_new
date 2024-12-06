<?php

class ViagemController
{

    public static function index()
    {
        $viagem_DAO = new ViagemDAO();
        $lista_viagem = $viagem_DAO->getAllRows();
        $total_viagem = count($lista_viagem);

        include 'View/modulos/viagem/listar_viagem.php';
    }

    public static function cadastrar()
    {

        $veiculo_DAO = new VeiculoDAO();
        $lista_veiculo = $veiculo_DAO->getAllRows();
        $total_veiculo = count($lista_veiculo);

        $funcionario_DAO = new FuncionarioDAO();
        $lista_func = $funcionario_DAO->getAllRows();
        $total_func = count($lista_func);

        $carga_DAO = new CargaDAO();
        $lista_car = $carga_DAO->getAllRows();
        $total_car = count($lista_car);

        include 'View/modulos/viagem/cadastrar_viagem.php';
    }

    public static function salvar()
    {
        $viagem_DAO = new ViagemDAO();

        $dados_para_salvar = [
            'id' => $_POST['id'] ?? null,
            'data_inicio' => $_POST['data_inicio'] ?? null,
            'endereco_partida' => $_POST['endereco_partida'] ?? null,
            'id_veiculo' => $_POST['id_veiculo'] ?? null,
            'id_funcionario' => $_POST['id_funcionario'] ?? null,
            'id_carga' => $_POST['id_carga'] ?? null,
            'data_fim' => $_POST['data_fim'] ?? null,
            'endereco_chegada' => $_POST['endereco_chegada'] ?? null,
            'observacao' => $_POST['observacao'] ?? null,
        ];

        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $viagem_DAO->update($dados_para_salvar);
            $viagem_id = $dados_para_salvar['id'];
        } else {
            $viagem_id = $viagem_DAO->insert($dados_para_salvar);
        }

        $paradas = $_POST['parada'] ?? [];
        $locais = $_POST['local'] ?? [];
        $valores = $_POST['valor_unitario'] ?? [];

        if (!empty($paradas)) {
            $parada_DAO = new ParadaDAO();
            for ($i = 0; $i < count($paradas); $i++) {
                $dados_parada = [
                    'parada' => $paradas[$i],
                    'local' => $locais[$i],
                    'valor_unitario' => $valores[$i],
                    'id_viagem' => $viagem_id,
                ];
                $parada_DAO->insert($dados_parada);

                //Gerar contas a Pagar
                $pagar_DAO = new contaspagarDAO();

                $dados_para_salvar_pg = array(
                    'descricao' => 'Viagem: '. $dados_para_salvar['id'] . ' - ' . $paradas[$i],
                    'dt_vencimento' => $_POST['data_inicio'],
                    'valor' => $valores[$i], 
                    'stts' => 'A',
                    'dt_pagamento' => NULL,
                    'form_pagamento' => NULL,
                    'plano_contas' => NULL, 
                    'observacao' => NULL,
                    'qnt_parcelas' => 1,
                    'cliente' => $_POST['id_funcionario']
                );

                $pagar_id = $pagar_DAO->insert($dados_para_salvar_pg);

                }
        }

        


        header('Location: /tcc/viagem');
        exit();
    }

    public static function excluir()
    {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $viagem_DAO = new ViagemDAO();
            $viagem_DAO->delete((int)$_GET['id']);
        }

        header("Location: /tcc/viagem");
        exit();
    }

    public static function ver()
    {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {

            $veiculo_DAO = new VeiculoDAO();
            $lista_veiculo = $veiculo_DAO->getAllRows();
            $total_veiculo = count($lista_veiculo);

            $funcionario_DAO = new FuncionarioDAO();
            $lista_func = $funcionario_DAO->getAllRows();
            $total_func = count($lista_func);

            $carga_DAO = new CargaDAO();
            $lista_carga = $carga_DAO->getAllRows();
            $total_carga = count($lista_carga);

            $viagem_DAO = new ViagemDAO();
            $dados_viagem = $viagem_DAO->getById((int)$_GET['id']);

            include 'View/modulos/viagem/cadastrar_viagem.php';
        } else {
            header("Location: /tcc/viagem");
            exit();
        }
    }
}
