<?php

class ViagemController {

    // Listar todas as viagens
    public static function index() {
        $viagem_DAO = new ViagemDAO();
        $lista_viagem = $viagem_DAO->getAllRows();
        $total_viagem = count($lista_viagem);

        // Passar as variáveis para a view
        include 'View/modulos/viagem/listar_viagem.php';
    }

    // Mostrar o formulário de cadastro
    public static function cadastrar() {
        include 'View/modulos/viagem/cadastrar_viagem.php';
    }

    // Salvar ou atualizar uma viagem
    public static function salvar() {
        $viagem_DAO = new ViagemDAO();

        // Validação básica dos dados recebidos
        $dados_para_salvar = [
            'id' => $_POST['id'] ?? null,
            'dt_inicio' => $_POST['dt_inicio'] ?? null,
            'endereco_saida' => $_POST['endereco_saida'] ?? null,
            'veiculo' => $_POST['veiculo'] ?? null,
            'motorista' => $_POST['motorista'] ?? null,
            'dt_fim' => $_POST['dt_fim'] ?? null,
            'endereco_chegada' => $_POST['endereco_chegada'] ?? null,
            'observacao' => $_POST['observacao'] ?? null,
        ];

        // Remover valores nulos para evitar problemas com o banco
        $dados_para_salvar = array_filter($dados_para_salvar, fn($value) => $value !== null);

        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $viagem_DAO->update($dados_para_salvar);
        } else {
            $viagem_DAO->insert($dados_para_salvar);
        }

        header('Location: /tcc/viagem');
        exit();
    }

    // Excluir uma viagem
    public static function excluir() {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $viagem_DAO = new ViagemDAO();
            $viagem_DAO->delete((int)$_GET['id']);
        }

        header("Location: /tcc/viagem");
        exit();
    }

    // Ver detalhes de uma viagem
    public static function ver() {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $viagem_DAO = new ViagemDAO();
            $dados_viagem = $viagem_DAO->getById((int)$_GET['id']);

            // Passar os dados para o formulário de edição
            include 'View/modulos/viagem/cadastrar_viagem.php';
        } else {
            header("Location: /tcc/viagem");
            exit();
        }
    }
}
