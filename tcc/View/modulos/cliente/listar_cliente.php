
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Listar Clientes</title>
</head>
<body>
    <?php include PATH_VIEW . 'includes/cabecalho.php' ?>
    <main>
    <table>
        <thead>
            <tr>
                <th>Ações:</th>
                <th>Id:</th>
                <th>Razão Social:</th>
                <th>Nome Fantasia:</th>
                <th>CPF|CNPJ:</th>
                <th>Inscrição Estadual:</th>
                <th>Endereço:</th>
                <th>Bairro:</th>
                <th>Complemento:</th>
                <th>Número:</th>
                <th>Cidade:</th>
                <th>Estado:</th>
                <th>Telefone 1 :</th>
                <th>Telefone 2:</th>
                <th>Observação:</th>
                <th>Ativo:</th>
                <th>Email:</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0; $i<$total_cli; $i++): ?>
            <tr>
                <td>
                    <a href="/tcc/cliente/ver?id=<?= $lista_cli[$i]->id ?>">Abrir</a>
                </td>
                <td> <?= $lista_cli[$i]->id ?> </td>
                <td> <?= $lista_cli[$i]->razao_social ?></td>
                <td> <?= $lista_cli[$i]->nome_fantasia ?></td>
                <td> <?= $lista_cli[$i]->cnpj_cpf ?></td>
                <td> <?= $lista_cli[$i]->inscricao_estadual ?></td>
                <td> <?= $lista_cli[$i]->endereco ?></td>
                <td> <?= $lista_cli[$i]->bairro ?> </td>
                <td> <?= $lista_cli[$i]->complemento ?></td>
                <td> <?= $lista_cli[$i]->numero ?></td>
                <td> <?= $lista_cli[$i]->cidade ?></td>
                <td> <?= $lista_cli[$i]->estado ?></td>
                <td> <?= $lista_cli[$i]->telefone1 ?></td>
                <td> <?= $lista_cli[$i]->telefone2 ?> </td>
                <td> <?= $lista_cli[$i]->observacao ?></td>
                <td> <?= $lista_cli[$i]->ativo ?></td>
                <td> <?= $lista_cli[$i]->email ?></td>
            </tr>
            <?php endfor ?>
        </tbody>
    </table>
    </main>
    <?php include PATH_VIEW . 'includes/rodape.php' ?>
</body>
</html>