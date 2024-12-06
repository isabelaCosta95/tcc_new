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

        $funcionario_DAO = new FuncionarioDAO();
        $lista_func = $funcionario_DAO->getAllRows();
        $total_func = count($lista_func);

        include 'View/modulos/manutencao/cadastrar_manutencao.php';
    }

    public static function salvar(){

        $manutencao_DAO = new ManutencaoDAO();

        $dados_para_salvar = array(
            'descricao' => $_POST['descricao'],
    'tipo' => $_POST['tipo'],
    'dt_manutencao' => $_POST['dt_manutencao'],
    'quilometragem' => $_POST['quilometragem'],
    'id_veiculo' => $_POST['id_veiculo'],
    'valor' => str_replace(',', '.', str_replace('.', '', $_POST['valor'])), // Convertendo valor para formato numérico
    'valor_total' => str_replace(',', '.', str_replace('.', '', $_POST['valor_total'])), // Convertendo valor_total para formato numérico
    'id_funcionario' => $_POST['id_funcionario'],
        );
        
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $manutencao_DAO->update($dados_para_salvar);
            $manutencao_id = $dados_para_salvar['id'];
        } else {
            $manutencao_id = $manutencao_DAO->insert($dados_para_salvar);
        }   

        $pecas = $_POST['peca'] ?? [];
        $quantidades = $_POST['quantidade'] ?? [];
        $valores = $_POST['valor_unitario'] ?? [];

        if (!empty($pecas)) {
            $peca_DAO = new PecasusadasDAO();
            for ($i = 0; $i < count($pecas); $i++) {
                $dados_peca = [
                    'peca' => $pecas[$i],
                    'quantidade' => $quantidades[$i],
                    'valor_unitario' => $valores[$i],
                    'id_veiculo' => $manutencao_id,
                ];
                $peca_DAO->insert($dados_peca);

                //Gerar contas a Pagar
                $pagar_DAO = new contaspagarDAO();

                $dados_para_salvar_pg = array(
                    'descricao' => 'Viagem: '. $dados_para_salvar['id'] . ' - ' . $pecas[$i],
                    'dt_vencimento' => date('Y-m-d', strtotime('+1 month')),
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