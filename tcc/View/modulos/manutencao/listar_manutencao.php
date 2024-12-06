<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tcc/View/includes/css/listar.css">
    <title>Manutenção de Veículo</title>
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
                <h2>Manutenções</h2>
            </div>


            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Data da Manutenção</th>
                        <th>Descrição do serviço</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $total_manut; $i++): ?>
                        <tr>
                            <td><?= $lista_manut[$i]->id ?></td>
                            <td><?= $lista_manut[$i]->data ?></td>
                            <td><?= $lista_manut[$i]->descricao ?></td>

                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </main>
    </div>

    <div class="footer">
        <?php include PATH_VIEW . 'includes/rodape.php' ?>
    </div>
</body>

</html>