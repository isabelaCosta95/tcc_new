<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Categoria</title>
</head>
<body>
    <?php include PATH_VIEW . 'includes/cabecalho.php' ?>
    <main>

    <?php if(isset($_GET['excluido'])): ?>
        <p>Categoria Excluída</p>
    <?php endif ?>

        <table>
            <thead>
                <tr>
                    <th>Ações:</th>
                    <th>Id:</th>
                    <th>Descrição:</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=0; $i<$total_categ; $i++): ?>
                <tr>
                    <td>
                        <a href="/tcc/categoria/ver?id=<?= $lista_categ[$i]->id ?>">Abrir</a>
                    </td>
                    <td> <?= $lista_categ[$i]->id ?> </td>
                    <td> <?= $lista_categ[$i]->descricao ?></td>
                </tr>
                <?php endfor ?>
            </tbody>
        </table>
    </main>
    <?php include PATH_VIEW . 'includes/rodape.php' ?>
</body>
</html>