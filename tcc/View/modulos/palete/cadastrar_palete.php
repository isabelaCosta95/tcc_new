<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Movimentação de Paletes</title>
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
            <h1>Movimentação de Paletes</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/palete/salvar">
                <div class="form-section">
                    
                    <div class="form-row">
                        <div class="form-column">
                            <label>Produto
                                <select name="produto" class="form-control">
                                    <option >Palete</option>
                                </select>
                            </label>

                            <label>Quantidade
                                <input name="quantidade" value="<?= isset($dados_pal) && isset($dados_pal->quantidade) ? $dados_pal->quantidade : "" ?>" type="text"/>
                            </label>
                        </div>
                        <div class="form-column">
                            <label>Tipo de Movimentação
                                <select name="tipo" class="form-control">
                                    <option value="E" <?= isset($dados_pal) && $dados_pal->tipo == 'E' ? 'selected' : '' ?>>Entrada</option>
                                    <option value="S" <?= isset($dados_pal) && $dados_pal->tipo == 'S' ? 'selected' : '' ?>>Saída</option>
                                </select>
                            </label>

                            <label>Justificativa
                                <input name="justificativa" value="<?= isset($dados_pal) && isset($dados_pal->justificativa) ? $dados_pal->justificativa : "" ?>" type="text"/>
                            </label>
                        </div>
                    </div>   
                </div>

                <!-- Campo oculto para o ID (aparece apenas se houver um ID) -->
                <?php if (isset($dados_pal)): ?>
                    <input type="hidden" name="id" value="<?= $dados_pal->id ?>">
                <?php endif; ?>

                <div class="form-buttons">
                    <button type="submit">Adicionar</button>
                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/palete'">Consultar Movimentações</button>
                </div>
            </form>

        </div>
    </div>
        