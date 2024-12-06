<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tcc/View/includes/css/listar.css">
    <title>Listar Contas a Pagar</title>
    <style>
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

        .status-aberto,
        .status-pago,
        .status-cancelado {
            color: #fff;
            padding: 5px 10px;
            border-radius: 15px;
            text-align: center;
            width: 100px;
            display: inline-block;
        }

        .status-aberto {
            background-color: #ffeb3b;
        }

        .status-pago {
            background-color: #4caf50;
        }

        .status-cancelado {
            background-color: #f44336;
        }

        .icon {
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

        select,
        input[type="text"],
        input[type="date"] {
            width: 150px;
            padding: 10px;
            border: 1px solid #6c757d;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .checkbox-group {
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
        }

        .form-group {
            display: flex;
            align-items: center;
            gap: 10px;

        }

        button[type="submit"] {
            margin-top: 0;
            background-color: #28a745;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="header">
        <?php include PATH_VIEW . 'includes/cabecalho.php' ?>
    </div>

    <div class="container">
        <div class="menu">
            <?php include PATH_VIEW . 'includes/menu.php' ?>
        </div>

        <main>
            <div class="titulo-pagina">
                <h2>Movimentação Contas a Pagar</h2>
            </div>

            <?php if (isset($_GET['excluido'])): ?>
                <p>Conta Excluída</p>
            <?php endif ?>

            <form method="GET" action="/tcc/contasPagar">
                <div class="form-group">
                    <div class="checkbox-group">
                        <label for="descricao">Descrição:</label>
                        <input type="text" name="descricao" id="descricao" value="<?= $_GET['descricao'] ?? '' ?>">
                    </div>

                    <div class="checkbox-group">
                        <label for="dt_pagamento">Data de Pagamento:</label>
                        <input type="date" name="dt_pagamento" id="dt_pagamento" value="<?= $_GET['dt_pagamento'] ?? '' ?>">
                    </div>

                    <div class="checkbox-group">
                        <label for="dt_vencimento">Data de Vencimento:</label>
                        <input type="date" name="dt_vencimento" id="dt_vencimento" value="<?= $_GET['dt_vencimento'] ?? '' ?>">
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
                </div>
            </form>


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
                    <?php for ($i = 0; $i < $total_pag; $i++): ?>
                        <tr>
                            <td class="icon">
                                <?php if ($lista_pag[$i]->stts === 'A'): ?>
                                    <input type="checkbox">
                                <?php endif; ?>
                                <a href="/tcc/contasPagar/ver?id=<?= $lista_pag[$i]->id ?>">
                                    <img class="icon" title="Editar" src="/tcc/View/includes/imagem/lapis.png" alt="Ícone de Lápis">
                                </a>
                            </td>
                            <td><?= $lista_pag[$i]->id ?></td>
                            <td><?= $lista_pag[$i]->descricao ?></td>
                            <td><?= !empty($lista_pag[$i]->dt_pagamento) ? (new DateTime($lista_pag[$i]->dt_pagamento))->format('d/m/Y') : '' ?></td>
                            <td><?= !empty($lista_pag[$i]->dt_vencimento) ? (new DateTime($lista_pag[$i]->dt_vencimento))->format('d/m/Y') : '' ?></td>
                            <td><?= 'R$ ' . number_format($lista_pag[$i]->valor, 2, ',', '.') ?></td>
                            <td>
                                <span class="
                        <?php
                        switch ($lista_pag[$i]->stts) {
                            case 'A':
                                echo 'status-aberto';
                                break;
                            case 'P':
                                echo 'status-pago';
                                break;
                            case 'C':
                                echo 'status-cancelado';
                                break;
                            default:
                                echo '';
                        }
                        ?>
                    ">
                                    <?php
                                    switch ($lista_pag[$i]->stts) {
                                        case 'A':
                                            echo 'Aberto';
                                            break;
                                        case 'P':
                                            echo 'Pago';
                                            break;
                                        case 'C':
                                            echo 'Cancelado';
                                            break;
                                        default:
                                            echo 'Status Desconhecido';
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>

            <div class="form-group">
                <div class="checkbox-group">
                    <label for="form_pagamento">Forma de Pagamento</label>
                    <select id="form_pagamento" name="form_pagamento" class="form-control" style="width: 250px">
                        <option value="">Selecione</option>
                        <?php foreach ($formas_pagamento as $forma): ?>
                            <option value="<?= $forma['id'] ?>"
                                <?= isset($dados_pagar) && $dados_pagar->form_pagamento == $forma['id'] ? 'selected' : '' ?>>
                                <?= $forma['descricao'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="checkbox-group">
                    <label for="dt_pagamento">Data de Pagamento</label>
                    <input type="date" name="dt_pagamento" id="dt_pagamento" value="<?= $_GET['dt_pagamento'] ?? '' ?>">
                </div>

                <div class="checkbox-group">
                    <button class="baixar-conta" type="submit">Baixar Conta</button>
                </div>
            </div>

    </main>
    </div>
    <div class="footer">
        <?php include PATH_VIEW . 'includes/rodape.php' ?>
    </div>
</body>

</html>