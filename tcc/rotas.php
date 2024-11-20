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



        // Rotas Produtos
        case '/tcc/produto':
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

        // Rotas Usuario
        // case '/tcc/usuario':
        //     UsuarioController::index();
        // break;

        // case '/tcc/usuario/cadastrar':
        //     UsuarioController::cadastrar();
        // break;

        // case '/tcc/usuario/ver':
        //     UsuarioController::ver();
        // break;

        // case '/tcc/usuario/salvar':
        //     UsuarioController::salvar();
        // break;

        // case '/tcc/usuario/excluir':
        //     UsuarioController::excluir();
        // break;

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
        

    // Rotas Motorista
    case '/tcc/motorista':
        MotoristaController::index();
    break;

    case '/tcc/motorista/cadastrar':
        MotoristaController::cadastrar();
    break;

    case '/tcc/motorista/ver':
        MotoristaController::ver();
    break;

    case '/tcc/motorista/salvar':
        MotoristaController::salvar();
    break;

    case '/tcc/motorista/excluir':
        MotoristaController::excluir();
    break;
    }

    
}
catch(Exception $e){
    echo 'Deu erro ' . $e->getMessage();
}
