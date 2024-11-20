
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Listar Motoristas<//title>
</head>
<body>
    <?php include PATH_VIEW . 'includes/cabecalho.php' ?>
    <main>
    <table>
        <thead>
            <tr>
                <th>Ações:</th>
                <th>Id:</th>
                <th>Nome Completo:</th>
                <th>CPF:</th>
                <th>Telefone:</th>
                <th>Chave Pix:</th>
                <th>Email:</th>
                <th>Ativo:</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0; $i<$total_mot; $i++): ?>
            <tr>
                <td>
                    <a href="/tcc/motorista/ver?id=<?= $lista_mot[$i]->id ?>">Abrir</a>
                </td>
                <td> <?= $lista_mot[$i]->id ?> </td>
                <td> <?= $lista_mot[$i]->nome_completo ?></td>
                <td> <?= $lista_mot[$i]->cpf ?></td>
                <td> <?= $lista_mot[$i]->telefone ?></td>
                <td> <?= $lista_mot[$i]->chave_pix ?> </td>
                <td> <?= $lista_mot[$i]->email ?></td>
                <td> <?= $lista_mot[$i]->ativo ?></td>

            </tr>
            <?php endfor ?>
        </tbody>
    </table>
    </main>
    <?php include PATH_VIEW . 'includes/rodape.php' ?>
</body>
</html>