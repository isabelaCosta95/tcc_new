<html>
    <head>
        <title>Listar Plano de Conta</title>
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
                        <th>Ativo</th>
                        <th>Natureza</th>
                        <th>Tipo de Conta</th>
                        <th>Observação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i=0; $i<$total_plac; $i++): ?>
                    <tr>
                        <td>
                            <a href="/tcc/planoContas/ver?id=<?= $lista_plac[$i]->id ?>">Abrir</a>
                        </td>
                        <td> <?= $lista_plac[$i]->id ?> </td>
                        <td> <?= $lista_plac[$i]->descricao ?></td>
                        <td> <?= $lista_plac[$i]->ativo ?> </td>
                        <td> <?= $lista_plac[$i]->natureza ?></td>
                        <td> <?= $lista_plac[$i]->tipo ?> </td>
                        <td> <?= $lista_plac[$i]->observacao ?></td>
                    </tr>
                    <?php endfor ?>
                </tbody>
            </table>
        </main>
        <?php include PATH_VIEW . 'includes/rodape.php' ?>
    </body>
</html>