<html>
    <head>
        <title>Listar Produtos</title>
    </head>

    <body>
        <?php include PATH_VIEW . 'includes/cabecalho.php' ?>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>Ações</th>
                        <th>Id</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i=0; $i<$total_prod; $i++): ?>
                    <tr>
                        <td>
                            <a href="/tcc/produto/ver?id=<?= $lista_prod[$i]->id ?>">Abrir</a>
                        </td>
                        <td> <?= $lista_prod[$i]->id ?> </td>
                        <td> <?= $lista_prod[$i]->descricao ?></td>
                    </tr>
                    <?php endfor ?>
                </tbody>
            </table>
        </main>
        <?php include PATH_VIEW . 'includes/rodape.php' ?>
    </body>
</html>