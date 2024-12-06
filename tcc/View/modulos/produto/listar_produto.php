<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produtos</title>
    <style>

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        height: 100vh;
        overflow: hidden;
    }

    .footer {
        background-color: #f8f9fa;
        text-align: center;
        padding: 0px;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        margin-bottom: 0px;
        border-top: 1px solid #ddd;
    }

    .container {
        display: flex;
        flex: 1;
        margin-top: 60px;
        margin-bottom: 10px;
    }

    .menu {
        width: 15%;
        background-color: #f8f9fa;
        padding: 0px;
        box-sizing: border-box;
        border-right: 0px solid #ddd;
        margin-left: 15px;

    }

    main {
        flex: 1;
        padding: 20px;
        box-sizing: border-box;
        background-color: #f8f9fa;
        margin: 0px;
    }

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

    .icon img {
        width: 16px;
        height: 16px;
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
                <h2>Produtos</h2>
            </div>

            <?php if(isset($_GET['excluido'])): ?>
                <p>Produto Excluído</p>
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
                    <?php for($i=0; $i<$total_prod; $i++): ?>
                    <tr>
                        <td class="icon">
                            <a href="/tcc/produto/ver?id=<?= $lista_prod[$i]->id ?>">
                                <img title="Editar" src="/tcc/View/includes/imagem/lapis.png" alt="Ícone de Lápis">
                            </a>
                        </td>
                        <td> <?= $lista_prod[$i]->id ?> </td>
                        <td> <?= $lista_prod[$i]->descricao ?></td>
                    </tr>
                    <?php endfor ?>
                </tbody>
            </table>
        </main>
    </div>

    <div class="footer">
        <?php include PATH_VIEW . 'includes/rodape.php' ?>
    </div>

</body>
</html>