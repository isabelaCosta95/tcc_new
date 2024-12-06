<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tcc/View/includes/css/listar.css">
    <title>Listar Formas de Pagamento</title>
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
                <h2>Formas de Pagamento</h2>
            </div>

            <?php if(isset($_GET['excluido'])): ?>
                <p>Categoria Excluída</p>
            <?php endif ?>

    
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Código</th>
                        <th>Descrição</th>
                        <th>Ativo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i=0; $i<$total_fpag; $i++): ?>
                    <tr>
                        <td class="icon">
                            <a href="/tcc/formaPagamento/ver?id=<?= $lista_fpag[$i]->id ?>">
                                <img class="icon" title="Editar" src="/tcc/View/includes/imagem/lapis.png" alt="Ícone de Lápis">
                            </a>
                        </td>
                        <td><?= $lista_fpag[$i]->id ?></td>
                        <td><?= $lista_fpag[$i]->descricao ?></td>
                        <td>
                            <?= ($lista_fpag[$i]->ativo == 'S') ? 'Sim' : 'Não'; ?>
                        </td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </main>
    

    <div class="footer">
        <?php include PATH_VIEW . 'includes/rodape.php' ?>
    </div>
    
</body>
</html>