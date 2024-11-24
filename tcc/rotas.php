<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try{
    switch($uri_parse){

        //Tela inicial
        case '/tcc/':
            include "View/home.php";
        break;

        //Autenticar usuário
        case '/tcc/login':
        break;

        case '/tcc/sair':
        break;

        // Rotas Empresa
        case '/tcc/empresa':
            EmpresaController::index();
        break;

        case '/tcc/empresa/cadastrar':
            EmpresaController::cadastrar();
        break;

        case '/tcc/empresa/ver':
            EmpresaController::ver();
        break;

        case '/tcc/empresa/salvar':
            EmpresaController::salvar();
        break;

        case '/tcc/empresa/excluir':
            EmpresaController::excluir();
        break;

        // Rotas Seguradora
        case '/tcc/seguradora':
            SeguradoraController::index();
        break;

        case '/tcc/seguradora/cadastrar':
            SeguradoraController::cadastrar();
        break;

        case '/tcc/seguradora/ver':
            SeguradoraController::ver();
        break;

        case '/tcc/seguradora/salvar':
            SeguradoraController::salvar();
        break;

        case '/tcc/seguradora/excluir':
            SeguradoraController::excluir();
        break;

        // Rotas Cidade
        case '/tcc/cidade':
            CidadeController::index();
        break;

        case '/tcc/cidade/cadastrar':
            CidadeController::cadastrar();
        break;

        case '/tcc/cidade/ver':
            CidadeController::ver();
        break;

        case '/tcc/cidade/salvar':
            CidadeController::salvar();
        break;

        case '/tcc/cidade/excluir':
            CidadeController::excluir();
        break;

        // Rotas Forma de Pagamento
        case '/tcc/formaPagamento':
            FormaPagamentoController::index();
        break;

        case '/tcc/formaPagamento/cadastrar':
            FormaPagamentoController::cadastrar();
        break;

        case '/tcc/formaPagamento/ver':
            FormaPagamentoController::ver();
        break;

        case '/tcc/formaPagamento/salvar':
            FormaPagamentoController::salvar();
        break;

        case '/tcc/formaPagamento/excluir':
            FormaPagamentoController::excluir();
        break;

        // Rotas Movimentação de Paletes
        case '/tcc/palete':
            PaleteController::index();
        break;

        case '/tcc/palete/cadastrar':
            PaleteController::cadastrar();
        break;

        case '/tcc/palete/ver':
            PaleteController::ver();
        break;

        case '/tcc/palete/salvar':
            PaleteController::salvar();
        break;

        case '/tcc/palete/excluir':
            PaleteController::excluir();
        break;


        // Rotas Plano de Contas
        case '/tcc/planoContas':
            PlanoContasController::index();
        break;

        case '/tcc/planoContas/cadastrar':
            PlanoContasController::cadastrar();
        break;

        case '/tcc/planoContas/ver':
            PlanoContasController::ver();
        break;

        case '/tcc/planoContas/salvar':
            PlanoContasController::salvar();
        break;

        case '/tcc/planoContas/excluir':
            PlanoContasController::excluir();
        break;

        // Rotas Produtos
        case '/tcc/planoContas':
            ProdutoController::index();
        break;

        case '/tcc/produto/cadastrar':
            ProdutoController::cadastrar();
        break;

        case '/tcc/produto/ver':
            ProdutoController::ver();
        break;

        case '/tcc/produto/salvar':
            ProdutoController::salvar();
        break;

        case '/tcc/produto/excluir':
            ProdutoController::excluir();
        break;

        // Rotas Contas a pagar
        case '/tcc/contasPagar':
            ContasPagarController::index();
        break;

        case '/tcc/contasPagar/cadastrar':
            ContasPagarController::cadastrar();
        break;

        case '/tcc/contasPagar/ver':
            ContasPagarController::ver();
        break;

        case '/tcc/contasPagar/salvar':
            ContasPagarController::salvar();
        break;

        case '/tcc/contasPagar/excluir':
            ContasPagarController::excluir();
        break;

        // Rotas Contas a receber
        case '/tcc/contasReceber':
            ContasReceberController::index();
        break;

        case '/tcc/contasReceber/cadastrar':
            ContasReceberController::cadastrar();
        break;

        case '/tcc/contasReceber/ver':
            ContasReceberController::ver();
        break;

        case '/tcc/contasReceber/salvar':
            ContasReceberController::salvar();
        break;

        case '/tcc/contasReceber/excluir':
            ContasReceberController::excluir();
        break;

        // Rotas Cliente
        case '/tcc/cliente':
            ClienteController::index();
        break;

        case '/tcc/cliente/cadastrar':
            ClienteController::cadastrar();
        break;

        case '/tcc/cliente/ver':
            ClienteController::ver();
        break;

        case '/tcc/cliente/salvar':
            ClienteController::salvar();
        break;

        case '/tcc/cliente/excluir':
            ClienteController::excluir();
        break;
        
        // Rotas Categoria
        case '/tcc/categoria':
            CategoriaController::index(); //index
        break;

        case '/tcc/categoria/cadastrar':
            CategoriaController::cadastrar();
        break;

        case '/tcc/categoria/salvar':
            CategoriaController::salvar();
        break;

        case '/tcc/categoria/ver':
            CategoriaController::ver();
        break;

        case '/tcc/categoria/excluir':
            CategoriaController::excluir();
        break;

        default:
            echo "Rota inválida";
        break;

        //Rotas Veículos
        case '/tcc/veiculo':
            VeiculoController::index();
        break;
    
        case '/tcc/veiculo/cadastrar':
            VeiculoController::cadastrar();
        break;
    
        case '/tcc/veiculo/ver':
            VeiculoController::ver();
        break;
    
        case '/tcc/veiculo/salvar':
            VeiculoController::salvar();
        break;
    
        case '/tcc/veiculo/excluir':
            VeiculoController::excluir();
        break;
    

    //Rotas Estado
    case '/tcc/estado':
        EstadoController::index();
    break;

    case '/tcc/estado/cadastrar':
        EstadoController::cadastrar();
    break;

    case '/tcc/estado/ver':
        EstadoController::ver();
    break;

    case '/tcc/estado/salvar':
        EstadoController::salvar();
    break;

    case '/tcc/estado/excluir':
        EstadoController::excluir();
    break;

     // Rotas Funcionario
     case '/tcc/funcionario':
        FuncionarioController::index();
    break;

    case '/tcc/funcionario/cadastrar':
        FuncionarioController::cadastrar();
    break;

    case '/tcc/funcionario/ver':
        FuncionarioController::ver();
    break;

    case '/tcc/funcionario/salvar':
        FuncionarioController::salvar();
    break;

    case '/tcc/funcionario/excluir':
        FuncionarioController::excluir();
    break;

    // Rotas Peça
    case '/tcc/peca':
        PecaController::index();
    break;

    case '/tcc/peca/cadastrar':
        PecaController::cadastrar();
    break;

    case '/tcc/peca/ver':
        PecaController::ver();
    break;

    case '/tcc/peca/salvar':
        PecaController::salvar();
    break;

    // Rotas Cargo
    case '/tcc/cargo':
        CargoController::index();
    break;

    case '/tcc/cargo/cadastrar':
        CargoController::cadastrar();
    break;

    case '/tcc/cargo/ver':
        CargoController::ver();
    break;

    case '/tcc/cargo/salvar':
        CargoController::salvar();
    break;

    // Rotas Carga
    case '/tcc/carga':
        CargaController::index();
    break;

    case '/tcc/carga/cadastrar':
        CargaController::cadastrar();
    break;

    case '/tcc/carga/ver':
        CargaController::ver();
    break;

    case '/tcc/carga/salvar':
        CargaController::salvar();
    break;

    case '/tcc/carga/excluir':
        CargaController::excluir();
    break;

    // Rotas Carga
    case '/tcc/carga':
        CargaController::index();
    break;

    case '/tcc/carga/cadastrar':
        CargaController::cadastrar();
    break;

    case '/tcc/carga/ver':
        CargaController::ver();
    break;

    case '/tcc/carga/salvar':
        CargaController::salvar();
    break;

    case '/tcc/carga/excluir':
        CargaController::excluir();
    break;


    // Rotas Viagem
    case '/tcc/viagem':
        ViagemController::index();
    break;

    case '/tcc/viagem/cadastrar':
        ViagemController::cadastrar();
    break;

    case '/tcc/viagem/ver':
        ViagemController::ver();
    break;

    case '/tcc/viagem/salvar':
        ViagemController::salvar();
    break;

    case '/tcc/viagem/excluir':
        ViagemController::excluir();
    break;


    // Rotas Manutencao
    case '/tcc/manutencao':
        ManutencaoController::index();
    break;

    case '/tcc/manutencao/cadastrar':
        ManutencaoController::cadastrar();
    break;

    case '/tcc/manutencao/ver':
        ManutencaoController::ver();
    break;

    case '/tcc/manutencao/salvar':
        ManutencaoController::salvar();
    break;

    case '/tcc/manutencao/excluir':
        ManutencaoController::excluir();
    break;

    }
}
catch(Exception $e){
    echo 'Deu erro ' . $e->getMessage();
}