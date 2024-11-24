<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Cadastro Peça</title>
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
            <h1>Cadastrar Peça</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/peca/salvar">
                <div class="form-section">
                    <h2>Dados Principais</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label>Descrição
                                <input name="descricao" value="<?= isset($dados_peca) && isset($dados_peca->descricao) ? $dados_peca->descricao : "" ?>" type="text"/>
                            </label>
                        </div>
                        <div class="form-column">
                            <label>Ativo
                                <select name="ativo" class="form-control">
                                    <option value="S" <?= isset($dados_peca) && $dados_peca->ativo == 'S' ? 'selected' : '' ?>>Sim</option>
                                    <option value="N" <?= isset($dados_peca) && $dados_peca->ativo == 'N' ? 'selected' : '' ?>>Não</option>
                                </select>
                            </label>
                        </div>
                    </div>  
                    <label>Observação
                        <input name="descricao" value="<?= isset($dados_peca) && isset($dados_peca->descricao) ? $dados_peca->descricao : "" ?>" type="text"/>
                    </label>  
                </div>
    
                <!-- Campo oculto para o ID (aparece apenas se houver um ID) -->
                <?php if (isset($dados_peca)): ?>
                    <input type="hidden" name="id" value="<?= $dados_peca->id ?>">
                <?php endif; ?>

                <div class="form-buttons">
                    <!-- Botão dinâmico -->
                    <button type="submit">
                        <?= isset($dados_peca) ? 'Alterar' : 'Cadastrar' ?>
                    </button>

                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/peca'">Consultar</button>
                    
                    <?php if (isset($dados_peca)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/peca/excluir?id=<?= $dados_peca->id ?>'">
                            Excluir
                        </button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
        