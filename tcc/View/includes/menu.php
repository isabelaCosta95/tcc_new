<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Lateral Agrupado</title>
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

        .nav-group {
            margin-bottom: 1rem;
        }

        .nav-group-title {
            font-size: 1.2rem;
            font-weight: bold;
            padding: 0.75rem 1rem;
            color: #333;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-group-title i {
            color: #28a745;
        }

        .nav-group-title:hover {
            background-color: #28a745;
            color: #fff;
        }

        .nav-group-items {
            list-style: none;
            padding: 0;
            margin: 0;
            display: none;
        }

        .nav-group-items .nav-link {
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

        .nav-group-items .nav-link i {
            margin-right: 0.5rem;
            color: #28a745;
        }

        .nav-group-items .nav-link:hover {
            background-color: #28a745;
            color: #fff;
        }

        .nav-group-items .nav-link.active {
            background-color: #28a745;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="nav">
        <div class="nav-group">
            <div class="nav-group-title"><i class="fas fa-box"></i>Produto<i class="fa-solid fa-arrow-right"></i></div>
            <ul class="nav-group-items">
                <li><a href="/tcc/produto/cadastrar" class="nav-link"><i class="fas fa-cart-plus"></i>Produto</a></li>
                <li><a href="/tcc/categoria/cadastrar" class="nav-link"><i class="fas fa-tags"></i>Categoria</a></li>
                <li><a href="/tcc/palete/cadastrar" class="nav-link"><i class="fas fa-pallet"></i>Movimentação de Paletes</a></li>
            </ul>
        </div>

        <div class="nav-group">
            <div class="nav-group-title"><i class="fas fa-tags"></i>Financeiro<i class="fa-solid fa-arrow-right"></i></div>
            <ul class="nav-group-items">
                <li><a href="/tcc/cliente/cadastrar" class="nav-link"><i class="fas fa-address-card"></i>Cliente</a></li>
                <li><a href="/tcc/contasPagar/cadastrar" class="nav-link"><i class="fas fa-wallet"></i>Contas a Pagar</a></li>
                <li><a href="/tcc/contasReceber/cadastrar" class="nav-link"><i class="fas fa-coins"></i>Contas a Receber</a></li>
                <li><a href="/tcc/planoContas/cadastrar" class="nav-link"><i class="fas fa-list-alt"></i>Plano de Contas</a></li>
                <li><a href="/tcc/formaPagamento/cadastrar" class="nav-link"><i class="fas fa-exchange-alt"></i>Forma de Pagamentos</a></li>
            </ul>
        </div>

        <div class="nav-group">
            <div class="nav-group-title"><i class="fas fa-truck"></i>Veículo<i class="fa-solid fa-arrow-right"></i></div>
            <ul class="nav-group-items">
                <li><a href="/tcc/veiculo/cadastrar" class="nav-link"><i class="fas fa-car-side"></i>Veículo</a></li>
                <li><a href="/tcc/peca/cadastrar" class="nav-link"><i class="fas fa-cogs"></i>Peças</a></li>
                <li><a href="/tcc/manutencao/cadastrar" class="nav-link"><i class="fas fa-oil-can"></i>Realizar Manutencao</a></li>

            </ul>
        </div>

        <div class="nav-group">
            <div class="nav-group-title"><i class="fas fa-map"></i>Viagem<i class="fa-solid fa-arrow-right"></i></div>
            <ul class="nav-group-items">
                <li><a href="/tcc/seguradora/cadastrar" class="nav-link"><i class="fas fa-shield-alt"></i>Seguradora</a></li>
                <li><a href="/tcc/carga/cadastrar" class="nav-link"><i class="fas fa-dolly"></i>Carga</a></li>
                <li><a href="/tcc/viagem/cadastrar" class="nav-link"><i class="fas fa-route"></i>Viagem</a></li>
            </ul>
        </div>

        <div class="nav-group">
            <div class="nav-group-title"><i class="fas fa-key"></i>ADM<i class="fa-solid fa-arrow-right"></i></div>
            <ul class="nav-group-items">
                <li><a href="/tcc/empresa/cadastrar" class="nav-link"><i class="fas fa-building"></i>Empresa</a></li>
                <li><a href="/tcc/funcionario/cadastrar" class="nav-link"><i class="fas fa-users"></i>Funcionário</a></li>
                <li><a href="/tcc/cidade/cadastrar" class="nav-link"><i class="fas fa-city"></i>Cidades</a></li>
                <li><a href="/tcc/cargo/cadastrar" class="nav-link"><i class="fas fa-id-badge"></i>Cargo</a></li>
            </ul>
        </div>
    </nav>
    <script>
        document.querySelectorAll('.nav-group-title').forEach(title => {
            title.addEventListener('click', () => {
                const items = title.nextElementSibling;
                items.style.display = items.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>
</body>
</html>
