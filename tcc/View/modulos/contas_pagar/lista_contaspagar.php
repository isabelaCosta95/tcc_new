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

    button {
        margin-top: 15px;
        background-color: #28a745; 
        color: #ffffff; 
        border: none; 
        padding: 15px; 
        border-radius: 4px; 
        cursor: pointer; 
    }

    label {
        margin-bottom: 5px;
        color: #495057; 
    }

    select, input[type="text"], input[type="date"]{
            width: 150px; 
            padding: 10px; 
            border: 1px solid #6c757d;
            border-radius: 4px;
            margin-bottom: 15px; 
            font-size: 16px; 
            transition: border-color 0.3s;
        }

    .checkbox-group{
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
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
        

        <div class="checkbox-group">
            <label for="dt_pagamento">Data de Pagamento:</label>
            <input type="date" name="dt_pagamento" id="dt_pagamento" value="<?= $_GET['dt_pagamento'] ?? date('Y-m-d') ?>">
        </div>

        <div class="checkbox-group">
            <label for="form_pagamento">Descrição:</label>
            <input type="text" name="form_pagamento" id="form_pagamento" value="<?= $_GET['form_pagamento'] ?? '' ?>">
        </div>

        <div class="checkbox-group">
            <label for="dt_vencimento">Data de Vencimento:</label>
            <input type="date" name="dt_vencimento" id="dt_vencimento" value="<?= $_GET['dt_vencimento'] ?? date('Y-m-d') ?>">
        </div>
        
        <div class="checkbox-group">
            <label for="form_pagamento">Forma de Pagamento:</label>
            <input type="text" name="form_pagamento" id="form_pagamento" value="<?= $_GET['form_pagamento'] ?? '' ?>">
        </div>
        
        <div class="checkbox-group">
            <label for="stts">Status:</label>
            <select name="stts" id="stts">
                <option value="">Todos</option>
                <option value="A" <?= (isset($_GET['stts']) && $_GET['stts'] == 'A') ? 'selected' : '' ?>>Aberto</option>
                <option value="P" <?= (isset($_GET['stts']) && $_GET['stts'] == 'P') ? 'selected' : '' ?>>Pago</option>
                <option value="C" <?= (isset($_GET['stts']) && $_GET['stts'] == 'C') ? 'selected' : '' ?>>Cancelado</option>
            </select>
        </div>

        <button type="submit">Filtrar</button>
    </form>'

    <!-- Resultados -->
    <table>
        <thead>
            <tr>
                <th>Ações</th>
                <th>Código</th>
                <th>Descrição</th>
                <th>Data de Pagamento</th>
                <th>Data de Vencimento</th>
                <th>Valor</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0; $i<$total_pag; $i++): ?>
            <tr>
                <td class="icon">
                    <input type="checkbox">
                    <a href="/tcc/contasPagar/ver?id=<?= $lista_pag[$i]->id ?>">
                        <img class="icon" title="Editar" src="/tcc/View/includes/imagem/lapis.png" alt="Ícone de Lápis">
                    </a>
                </td>
                <td><?= $lista_pag[$i]->id ?></td>
                <td><?= $lista_pag[$i]->descricao ?></td>
                <td><?= (new DateTime($lista_pag[$i]->dt_pagamento))->format('d/m/Y') ?></td>
                <td><?= (new DateTime($lista_pag[$i]->dt_vencimento))->format('d/m/Y') ?></td>
                <td><?= 'R$ ' . number_format($lista_pag[$i]->valor, 2, ',', '.') ?></td>
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

    <div class="checkbox-group" style="margin-left: 15px">
        <label>Forma de pagamento</label>
        <input type="text">
    </div>

    <div class="checkbox-group">
        <label>Data de Pagamento</label>
        <input type="date">
    </div>

    <div class="checkbox-group">
        <button class="baixar-conta" type="submit">Baixar Conta</button>
    </div>
    </main>
    <?php include PATH_VIEW . 'includes/rodape.php' ?>
</body>
</html>