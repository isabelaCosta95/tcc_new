<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tcc/View/includes/css/listar.css">
    <title>Empresa</title>
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
                <h2>Listar Categoria</h2>
            </div>

            <?php if(isset($_GET['excluido'])): ?>
                <p>Categoria Excluída</p>
            <?php endif ?>

            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Código</th>
                        <th>Nome Fantasia</th>
                        <th>CNPJ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i=0; $i<$total_emp; $i++): ?>
                    <tr>
                        <td class="icon">
                            <a href="/tcc/empresa/ver?id=<?= $lista_emp[$i]->id ?>">
                                <img class="icon" title="Editar" src="/tcc/View/includes/imagem/lapis.png" alt="Ícone de Lápis">
                            </a>
                        </td>
                        <td><?= $lista_emp[$i]->id ?></td>
                        <td><?= $lista_emp[$i]->nome_fantasia ?></td>
                        <td><?= $lista_emp[$i]->cnpj ?></td>
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