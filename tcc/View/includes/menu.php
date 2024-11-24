<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Lateral</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #f8f9fa;
        }
        .nav {
            width: 250px;
            height: 100vh;
            background-color: #f8f9fa;
            border-right: 1px solid #ddd;
            padding-top: 1rem;
            overflow-y: auto;
        }
        .nav-link {
            color: #333;
            font-size: 1rem;
            padding: 0.75rem 1rem;
            margin: 0.25rem 0;
            display: flex;
            align-items: center;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }
        .nav-link i {
            margin-right: 0.5rem;
        }
        .nav-link:hover {
            background-color: #e9ecef;
            color: #000;
        }
        .nav-link.active {
            background-color: #28a745;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="nav flex-column">
        <a href="/tcc/" class="nav-link active"><i class="fas fa-home"></i>Tela inicial</a>
        <a href="/tcc/empresa/cadastrar" class="nav-link"><i class="fas fa-box"></i>Cadastrar Empresa</a>
        <a href="/tcc/cliente/cadastrar" class="nav-link"><i class="fas fa-box"></i>Cadastrar Cliente</a>
        <a href="/tcc/categoria/cadastrar" class="nav-link"><i class="fas fa-tags"></i>Cadastrar Categoria</a>
        <a href="/tcc/contasPagar/cadastrar" class="nav-link"><i class="fas fa-tags"></i>Cadastrar Contas a Pagar</a>
        <a href="/tcc/contasReceber/cadastrar" class="nav-link"><i class="fas fa-tags"></i>Cadastrar Contas a Receber</a>
        <a href="/tcc/produto/cadastrar" class="nav-link"><i class="fas fa-cart-plus"></i>Cadastrar Produto</a>
        <a href="/tcc/veiculo/cadastrar" class="nav-link"><i class="fas fa-truck"></i>Cadastrar Veículo</a>
        <a href="/tcc/palete/cadastrar" class="nav-link"><i class="fas fa-truck"></i>Movimentação de Paletes</a>
        <a href="/tcc/funcionario/cadastrar" class="nav-link"><i class="fas fa-truck"></i>Cadastrar Funcionário</a>
        <a href="/tcc/carga/cadastrar" class="nav-link"><i class="fas fa-truck"></i>Cadastrar Carga</a>
        <a href="/tcc/viagem/cadastrar" class="nav-link"><i class="fas fa-truck"></i>Cadastrar Viagem</a>
        <a href="/tcc/manutencao/cadastrar" class="nav-link"><i class="fas fa-truck"></i>Cadastrar Manutencao</a>
        <a href="/tcc/planoContas/cadastrar" class="nav-link"><i class="fas fa-truck"></i>Cadastrar Plano de Contas</a>
        <a href="/tcc/formaPagamento/cadastrar" class="nav-link"><i class="fas fa-truck"></i>Cadastrar Forma de Pagamentos</a>
        <a href="/tcc/cidade/cadastrar" class="nav-link"><i class="fas fa-truck"></i>Cadastrar Cidades</a>
        <a href="/tcc/cargo/cadastrar" class="nav-link"><i class="fas fa-truck"></i>Cadastrar Cargo</a>
        <a href="/tcc/peca/cadastrar" class="nav-link"><i class="fas fa-truck"></i>Cadastrar Peças</a>
        <a href="/tcc/seguradora/cadastrar" class="nav-link"><i class="fas fa-truck"></i>Cadastrar Seguradora</a>
    </nav>
</body>
</html>
