<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Categorias</title>
    <style>
    /* Estilos gerais */
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        height: 100vh;
    }

    /* Cabeçalho fixo no topo */
    .header {
        background-color: #343a40;
        color: #fff;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
    }

    .header h1 {
        margin: 0;
        font-size: 18px;
    }

    .header button {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 4px;
        cursor: pointer;
    }

    .header button:hover {
        background-color: #c82333;
    }

    /* Rodapé fixo no fim */
    .footer {
        background-color: #f1f1f1;
        text-align: center;
        padding: 10px;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        border-top: 1px solid #ddd;
        font-size: 14px;
    }

    /* Layout principal */
    .container {
        display: flex;
        flex: 1;
        margin-top: 50px; /* Altura do cabeçalho */
        margin-bottom: 40px; /* Altura do rodapé */
    }

    .menu {
        width: 20%;
        background-color: #f8f9fa;
        padding: 10px;
        box-sizing: border-box;
        border-right: 1px solid #ddd; /* Apenas uma linha separando */
    }

    main {
        flex: 1;
        padding: 20px;
        box-sizing: border-box;
    }

    /* Estilo para a tabela */
    table {
        width: 100%; /* Ajusta largura total */
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

    /* Ícone do lápis */
    .icon img {
        width: 16px; /* Corrigido tamanho do lápis */
        height: 16px;
    }
    </style>
</head>
<body>
    <!-- Cabeçalho -->
    <div class="header">
        <h1>Sistema de Gerenciamento de Transportes</h1>
        <button>Sair</button>
    </div>

    <!-- Layout principal -->
    <div class="container">
        <!-- Menu lateral -->
        <div class="menu">
            <?php include PATH_VIEW . 'includes/menu.php' ?>
        </div>

        <!-- Conteúdo principal -->
        <main>
            <div class="titulo-pagina">
                <h2>Listar Contas a Pagar</h2>
            </div>

            <?php if(isset($_GET['excluido'])): ?>
                <p>Categoria Excluída</p>
            <?php endif ?>

            <!-- Resultados -->
            <table>
                <thead>
                    <tr>
                        <th>Ações</th>
                        <th>Código</th>
                        <th>Descrição</th>
                        <th>Ativo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i=0; $i<$total_categ; $i++): ?>
                    <tr>
                        <td class="icon">
                            <a href="/tcc/categoria/ver?id=<?= $lista_categ[$i]->id ?>">
                                <img title="Editar" src="/tcc/View/includes/imagem/lapis.png" alt="Ícone de Lápis">
                            </a>
                        </td>
                        <td><?= $lista_categ[$i]->id ?></td>
                        <td><?= $lista_categ[$i]->descricao ?></td>
                        <td><?= $lista_categ[$i]->ativo ?></td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </main>
    </div>

    <div class="footer">
        TMS - Todos os direitos reservados
    </div>
</body>
</html>
