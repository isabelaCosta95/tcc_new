<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tcc/View/includes/css/listar.css">
    <title>Listar Clientes</title>
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
                <h2>Listar Cliente</h2>
            </div>

            <?php if(isset($_GET['excluido'])): ?>
                <p>Cliente Excluída</p>
            <?php endif ?>

            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Código</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i=0; $i<$total_cli; $i++): ?>
                    <tr>
                        <td class="icon">
                            <a href="/tcc/cliente/ver?id=<?= $lista_cli[$i]->id ?>">
                                <img title="Editar" src="/tcc/View/includes/imagem/lapis.png" alt="Ícone de Lápis">
                            </a>
                        </td>
                        <td><?= $lista_cli[$i]->id ?></td>
                        <td><?= $lista_cli[$i]->descricao ?></td>
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