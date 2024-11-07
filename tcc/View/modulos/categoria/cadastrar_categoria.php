<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <h2>Cadastrar Categoria</h2>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/categoria/salvar">
                <div class="form-row">
                    <div class="form-column">
                        <label>Descrição
                            <input name="descricao" value="<?= isset($dados_categ) && isset($dados_categ->descricao) ? $dados_categ->descricao : "" ?>" type="text"/>
                        </label>
                    </div>
                </div>

                <?php if (isset($dados_categ)): ?>
                    <input name="id" type="hidden" value="<?= isset($dados_categ->id) ? $dados_categ->id : "" ?>"/>
                    <a href="/tcc/categoria/excluir?id=<?= isset($dados_categ->id) ? $dados_categ->id : "" ?>">Excluir</a>
                <?php endif; ?>
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
        