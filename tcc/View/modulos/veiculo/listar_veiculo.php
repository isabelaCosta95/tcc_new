<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow-x: auto;
            background-color: #f8f9fa !important;
        }

        .header {
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 1000;
            background-color: #343a40;
            color: white;
            padding: 10px;
            height: 60px;
        }

        .menu {
            display: flex;
            width: 300px;
            position: fixed;
            top: 92px;
            bottom: 0;
            overflow-y: hidden;
            overflow-x: hidden;
            background-color: #f8f9fa;
            z-index: 900;
            justify-content: space-around;
            white-space: nowrap;
        }

        .col-md-3 {
            width: auto !important; 
        }

        main {
            margin-top: 0px;
            margin-left: 300px;
            padding: 10px;
            background-color: #f8f9fa;
            overflow-y: auto;
        }

        .formulario {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 15px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #218838;
        }

        a {
            color: #dc3545;
            text-decoration: none;
            margin-top: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        .titulo-pagina {
            background-color: #f8f9fa !important;
            margin-top: 150px;
            margin-bottom: 0px;
            margin-left: 305px;
        }

        .titulo-pagina h2 {
            background-color: #f8f9fa;
            font-size: 24px;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
            color: red;
        }

        table {
            width: 100%;
        }

    </style>
</head>
<body>
    <div class="header">
        <?php include PATH_VIEW . 'includes/cabecalho.php' ?>
    </div> 
    <div class="titulo-pagina">
        <h2>Listar Veículos</h2>
    </div>
    <div class="menu">
        <?php include PATH_VIEW . 'includes/menu.php' ?>
    </div>
    <main>

    <?php if(isset($_GET['excluido'])): ?>
        <p>Veiculo Excluída</p>
    <?php endif ?>

        <table>
            <thead>
                <tr>
                    <th>Ações</th>
                    <th>Código</th>
                    <th>Modelo</th>
                    <th>Placa</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=0; $i<$total_veiculo; $i++): ?>
                <tr>
                    <td>
                        <a href="/tcc/veiculo/ver?id=<?= $lista_veiculo[$i]->id ?>">Abrir</a> 
                    </td>
                    <td> <?= $lista_veiculo[$i]->id ?> </td>
                    <td> <?= $lista_veiculo[$i]->marca_modelo ?></td>
                    <td> <?= $lista_veiculo[$i]->placa ?></td>
                </tr>
                <?php endfor ?>
            </tbody>
        </table>
    </main>
    <?php include PATH_VIEW . 'includes/rodape.php' ?>
</body>
</html>