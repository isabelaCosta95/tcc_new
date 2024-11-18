<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Cadastro Categoria</title>
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
            <h1>Cadastrar Categoria</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/categoria/salvar">
                <div class="form-section">
                    <h2>Dados</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label>Descrição
                                <input name="descricao" value="<?= isset($dados_categ) && isset($dados_categ->descricao) ? $dados_categ->descricao : "" ?>" type="text"/>
                            </label>
                        </div>
                        <div class="form-column">
                            <label>Ativo
                                <select name="ativo" class="form-control">
                                    <option value="1" <?= isset($dados_categ) && $dados_categ->ativo == 1 ? 'selected' : '' ?>>Sim</option>
                                    <option value="0" <?= isset($dados_categ) && $dados_categ->ativo == 0 ? 'selected' : '' ?>>Não</option>
                                </select>
                            </label>
                        </div>
                    </div>    
                </div>
                <div class="form-buttons">
                    <button type="submit">Cadastrar</button>
                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/categoria'">Consultar</button>
                    <?php if (isset($dados_categ)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/categoria/excluir?id=<?= $dados_categ->id ?>'">
                            Excluir
                        </button>
                    <?php endif ?>
                </div>
            </form>

        </div>
    </div>
        