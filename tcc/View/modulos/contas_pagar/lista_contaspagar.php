<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Contas a Pagar</title>
    <style>
    /* Estilo para a tabela */
    table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    thead th {
        background-color: #f2f2f2;
        color: #333;
        padding: 10px;
        border-bottom: 2px solid #ddd;
        text-align: left;
    }

    tbody td {
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tbody tr:hover {
        background-color: #f1f1f1;
    }

    td a {
        color: #007bff;
        text-decoration: none;
    }

    td a:hover {
        text-decoration: underline;
    }

    /* Estilos específicos para status com bordas arredondadas */
    .status-aberto, .status-pago, .status-cancelado {
        color: #fff;
        padding: 5px 10px;
        border-radius: 15px;
        text-align: center;
        width: 100px;
        display: inline-block;
    }

    .status-aberto {
        background-color: #ffeb3b; /* Amarelo */
    }

    .status-pago {
        background-color: #4caf50; /* Verde */
    }

    .status-cancelado {
        background-color: #f44336; /* Vermelho */
    }
    .icon{
        width: 20px;
        height: 20px;
        text-align: center;
    }
</style>
</head>

<body>
    <div class="header">
        <?php include PATH_VIEW . 'includes/cabecalho.php' ?>
    </div> 
    <div class="titulo-pagina">
        <h2>Listar Contas a Pagar</h2>
    </div>
    <div class="menu">
        <?php include PATH_VIEW . 'includes/menu.php' ?>
    </div>
    <main>

    <?php if(isset($_GET['excluido'])): ?>
        <p>Conta Excluída</p>
    <?php endif ?>
    
    <!-- Filtros -->
    <form method="GET" action="listar_contas.php">
        '<label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" value="<?= $_GET['descricao'] ?? '' ?>">

        <label for="dt_pagamento">Data de Pagamento:</label>
        <input type="date" name="dt_pagamento" id="dt_pagamento" value="<?= $_GET['dt_pagamento'] ?? '' ?>">

        <label for="dt_vencimento">Data de Vencimento:</label>
        <input type="date" name="dt_vencimento" id="dt_vencimento" value="<?= $_GET['dt_vencimento'] ?? '' ?>">

        <label for="form_pagamento">Forma de Pagamento:</label>
        <input type="text" name="form_pagamento" id="form_pagamento" value="<?= $_GET['form_pagamento'] ?? '' ?>">

        <label for="stts">Status:</label>
        <select name="stts" id="stts">
            <option value="">Todos</option>
            <option value="A" <?= (isset($_GET['stts']) && $_GET['stts'] == 'A') ? 'selected' : '' ?>>Aberto</option>
            <option value="P" <?= (isset($_GET['stts']) && $_GET['stts'] == 'P') ? 'selected' : '' ?>>Pago</option>
            <option value="C" <?= (isset($_GET['stts']) && $_GET['stts'] == 'C') ? 'selected' : '' ?>>Cancelado</option>
        </select>

        <button type="submit">Filtrar</button>
    </form>'

    <!-- Resultados -->
    <table>
        <thead>
            <tr>
                <th>Ações</th>
                <th>Código</th>
                <th>Descrição</th>
                <th>Quantidade de Parcelas</th>
                <th>Data de Pagamento</th>
                <th>Data de Vencimento</th>
                <th>Valor</th>
                <th>Forma de Pagamento</th>
                <th>Plano de Contas</th>
                <th>Observação</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0; $i<$total_pag; $i++): ?>
            <tr>
                <td class="icon">
                    <a href="/tcc/contasPagar/ver?id=<?= $lista_pag[$i]->id ?>">
                        <img class="icon" title="Editar" src="/tcc/View/includes/imagem/lapis.png" alt="Ícone de Lápis">
                    </a>
                </td>
                <td><?= $lista_pag[$i]->id ?></td>
                <td><?= $lista_pag[$i]->descricao ?></td>
                <td><?= $lista_pag[$i]->qnt_parcelas ?></td>
                <td><?= (new DateTime($lista_pag[$i]->dt_pagamento))->format('d/m/Y') ?></td>
                <td><?= (new DateTime($lista_pag[$i]->dt_vencimento))->format('d/m/Y') ?></td>
                <td><?= 'R$ ' . number_format($lista_pag[$i]->valor, 2, ',', '.') ?></td>
                <td><?= $lista_pag[$i]->form_pagamento ?></td>
                <td><?= $lista_pag[$i]->plano_contas ?></td>
                <td><?= $lista_pag[$i]->observacao ?></td>
                <td>
                    <span class="
                        <?php 
                            switch ($lista_pag[$i]->stts) {
                                case 'A': echo 'status-aberto'; break;
                                case 'P': echo 'status-pago'; break;
                                case 'C': echo 'status-cancelado'; break;
                                default: echo ''; 
                            }
                        ?>
                    ">
                        <?php 
                            switch ($lista_pag[$i]->stts) {
                                case 'A': echo 'Aberto'; break;
                                case 'P': echo 'Pago'; break;
                                case 'C': echo 'Cancelado'; break;
                                default: echo 'Status Desconhecido';
                            }
                        ?>
                    </span>
                </td>
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>
    </main>
    <?php include PATH_VIEW . 'includes/rodape.php' ?>
</body>
</html>