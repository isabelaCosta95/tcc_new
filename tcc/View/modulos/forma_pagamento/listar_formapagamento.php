<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Formas de Pagamento</title>
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
<script>
    function abrirJanela() {
        const largura = 800; // Define a largura da nova janela
        const altura = 600; // Define a altura da nova janela
        const left = (screen.width - largura) / 2; // Centraliza horizontalmente
        const top = (screen.height - altura) / 2; // Centraliza verticalmente

        window.open(
            window.location.href, // URL da página atual
            '_blank', // Abre em uma nova aba ou janela
            `width=${largura},height=${altura},top=${top},left=${left},resizable=yes,scrollbars=yes`
        );
    }
</script>

</head>

<body>
    <div class="header">
        <?php include PATH_VIEW . 'includes/cabecalho.php'; ?>
    </div>
    
    <div class="spacer"></div>

    <main>

    <?php if(isset($_GET['excluido'])): ?>
        <p>Forma de Pagamento Excluída</p>
    <?php endif ?>
    <button onclick="abrirJanela()">Abrir em Nova Janela</button>

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
    <?php include PATH_VIEW . 'includes/rodape.php' ?>
    <?php if (isset($abrir_nova_janela) && $abrir_nova_janela): ?>
<script>
    // Verifica se a janela já foi aberta na sessão
    if (!sessionStorage.getItem('janela_aberta')) {
        (function abrirJanela() {
            const largura = 800; // Largura da nova janela
            const altura = 600; // Altura da nova janela
            const left = (screen.width - largura) / 2; // Centraliza horizontalmente
            const top = (screen.height - altura) / 2; // Centraliza verticalmente

            window.open(
                window.location.href, // URL da página atual
                '_blank', // Abre em uma nova aba ou janela
                `width=${largura},height=${altura},top=${top},left=${left},resizable=yes,scrollbars=yes`
            );

            // Marca que a janela foi aberta
            sessionStorage.setItem('janela_aberta', 'true');
        })();
    }
</script>
<?php endif; ?>

</body>
</html>