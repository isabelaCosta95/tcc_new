<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tcc/View/includes/css/listar.css">
    <title>Movimentação de Paletes</title>
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
                <h2>Movimentação de Paletes</h2>
            </div>


            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Tipo</th>
                        <th>Quantidade</th>
                        <th>Justificativa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $total_pal; $i++): ?>
                        <tr>
                            <td><?= $lista_pal[$i]->id ?></td>
                            <td>
                                <?= $lista_pal[$i]->tipo == 'E' ? 'Entrada' : 'Saída' ?>
                            </td>                            <td><?= $lista_pal[$i]->quantidade ?></td>
                            <td><?= $lista_pal[$i]->justificativa ?></td>

                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>

            <!-- Exibindo a quantidade total de paletes abaixo da tabela -->
            <div class="total-paletes">
                <p><strong>Total de Paletes: </strong><?= $soma_paletes ?></p>
            </div>

        </main>
    </div>

    <div class="footer">
        <?php include PATH_VIEW . 'includes/rodape.php' ?>
    </div>
</body>

</html>
