<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Cadastro Cargo</title>
</head>
<body>
    <div class="header">
        <?php include PATH_VIEW . 'includes/cabecalho.php'; ?>
    </div>
    
    <div class="spacer"></div>

    <div class="menu">
        <?php include PATH_VIEW . 'includes/menu.php' ?>
    </div>
    <div class="conteudo">
        <div class="titulo-pagina">
            <h1>Cadastrar Cargo</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/cargo/salvar">
                <div class="form-section">
                    <h2>Dados</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label>Nome do cargo
                                <input name="nome" value="<?= isset($dados_car) && isset($dados_car->nome) ? $dados_car->nome : "" ?>" type="text"/>
                            </label>
                        </div>
                        <div class="form-column">
                            <label>Descrição
                                <input name="descricao" value="<?= isset($dados_car) && isset($dados_car->descricao) ? $dados_car->descricao : "" ?>" type="text"/>
                            </label>
                        </div>
                    </div>    
                </div>

                <!-- Campo oculto para o ID (aparece apenas se houver um ID) -->
                <?php if (isset($dados_car)): ?>
                    <input type="hidden" name="id" value="<?= $dados_car->id ?>">
                <?php endif; ?>

                <div class="form-buttons">
                    <!-- Botão dinâmico -->
                    <button type="submit">
                        <?= isset($dados_car) ? 'Alterar' : 'Cadastrar' ?>
                    </button>

                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/cargo'">Consultar</button>
                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/cargo'">Associar Viagem</button>
                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/cargo'">Contas a Receber</button>
                    <?php if (isset($dados_car)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/cargo/excluir?id=<?= $dados_car->id ?>'">
                            Excluir
                        </button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
        