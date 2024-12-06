<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tcc/View/includes/css/listar.css">
    <title>Listar Viagem</title>
    <style>
        button {
            background-color: #28a745;
            color: #ffffff;
            border: none;
            padding: 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            flex: 1;
        }

        button:hover {
            background-color: #218838;
        }

        button.btn-consultar {
            background-color: #34c759;
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
                <h2>Listar Viagem</h2>
            </div>

            <?php if (isset($_GET['excluido'])): ?>
                <p>Viagem Excluída</p>
            <?php endif ?>

            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Código</th>
                        <th>Data Inicio</th>
                        <th>Data Fim</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $total_viagem; $i++): ?>
                        <tr>
                            <td class="icon">
                                <a href="/tcc/viagem/ver?id=<?= $lista_viagem[$i]->id ?>">
                                    <img title="Editar" src="/tcc/View/includes/imagem/lapis.png" alt="Ícone de Lápis">
                                </a>
                            </td>
                            <td><?= $lista_viagem[$i]->id ?></td>
                            <td><?= $lista_viagem[$i]->data_inicio ?></td>
                            <td><?= $lista_viagem[$i]->data_fim ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
            <br>
            <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/contasPagar'">Contas a Pagar</button>
    </div>

    <div class="footer">
        <?php include PATH_VIEW . 'includes/rodape.php' ?>
    </div>
</body>

</html>
