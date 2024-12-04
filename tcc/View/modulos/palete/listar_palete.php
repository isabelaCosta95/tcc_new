<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentação de Paletes</title>
    <style>
    /* Estilo para a tabela */
    table {
        width: 50%;
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

    /* Estilos específicos para status com bordas arredondadas */
    .status-aberto, .status-pago, .status-cancelado {
        color: #fff;
        padding: 5px 10px;
        border-radius: 15px;
        text-align: center;
        width: 100px;
        display: inline-block;
    }

    .status-aberto {
        background-color: #ffeb3b; /* Amarelo */
    }

    .status-pago {
        background-color: #4caf50; /* Verde */
    }

    .status-cancelado {
        background-color: #f44336; /* Vermelho */
    }
    .icon{
        width: 20px;
        height: 20px;
        text-align: center;
    }

    button {
        margin-top: 15px;
        background-color: #28a745; 
        color: #ffffff; 
        border: none; 
        padding: 15px; 
        border-radius: 4px; 
        cursor: pointer; 
    }

    label {
        margin-bottom: 5px;
        color: #495057; 
    }

    select, input[type="text"], input[type="date"]{
            width: 150px; 
            padding: 10px; 
            border: 1px solid #6c757d;
            border-radius: 4px;
            margin-bottom: 15px; 
            font-size: 16px; 
            transition: border-color 0.3s;
        }

    .checkbox-group{
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
    }

</style>
</head>

<body>
    <div class="header">
        <?php include PATH_VIEW . 'includes/cabecalho.php' ?>
    </div> 
    <div class="titulo-pagina">
        <h2>Movimentaçãoo de Paletes</h2>
    </div>
    <div class="menu">
        <?php include PATH_VIEW . 'includes/menu.php' ?>
    </div>
    <main>

    <?php if(isset($_GET['excluido'])): ?>
        <p>Categoria Excluída</p>
    <?php endif ?>

    <!-- Resultados -->
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
            <?php for($i=0; $i<$total_pal; $i++): ?>
            <tr>
                <td><?= $lista_pal[$i]->id ?></td>
                <td><?= $lista_pal[$i]->tipo ?></td>
                <td><?= $lista_pal[$i]->quantidade ?></td>
                <td><?= $lista_pal[$i]->justificativa ?></td>

            </tr>
            <?php endfor; ?>
        </tbody>
    </table>
    </main>
    <?php include PATH_VIEW . 'includes/rodape.php' ?>
</body>
</html>