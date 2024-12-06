<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tcc/View/includes/css/listar.css">
    <title>Seguradoras</title>
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
                <h2>Seguradoras</h2>
            </div>

            <?php if (isset($_GET['excluido'])): ?>
                <p>Seguradora Excluída</p>
            <?php endif ?>

            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>CNPJ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $total_seg; $i++): ?>
                        <tr>
                            <td class="icon">
                                <a href="/tcc/seguradora/ver?id=<?= $lista_seg[$i]->id ?>">
                                    <img class="icon" title="Editar" src="/tcc/View/includes/imagem/lapis.png" alt="Ícone de Lápis">
                                </a>
                            </td>
                            <td><?= $lista_seg[$i]->id ?></td>
                            <td><?= $lista_seg[$i]->nome ?></td>
                            <td><?= $lista_seg[$i]->cnpj ?></td>
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