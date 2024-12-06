<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Lateral Agrupado</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/tcc/View/includes/css/menu.css">

</head>
<body>
    

    <nav class="nav">
    <img src="/tcc/logo.png" style="padding-left: 45px; width: 160px; height: auto;">
        <div class="nav-group">
            <div class="nav-group-title"><i class="fas fa-box"></i>Produto<i class="fa-solid fa-arrow-right"></i></div>
            <ul class="nav-group-items">
                <li><a href="/tcc/produto/cadastrar" class="nav-link"><i class="fas fa-cart-plus"></i>Produto</a></li>
                <li><a href="/tcc/categoria/cadastrar" class="nav-link"><i class="fas fa-tags"></i>Categoria</a></li>
                <li><a href="/tcc/palete/cadastrar" class="nav-link"><i class="fas fa-pallet"></i>Movimentação de Paletes</a></li>
            </ul>
        </div>

        <div class="nav-group">
            <div class="nav-group-title"><i class="fas fa-money-bill-wave"></i>Financeiro<i class="fa-solid fa-arrow-right"></i></div>
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