<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Cadastro Plano de Contas</title>
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
            <h1>Cadastrar Plano de Contas</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/planoContas/salvar">
                <div class="form-section">
                    <h2>Dados Principais</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label>Descrição
                                <input name="descricao" value="<?= isset($dados_plac) && isset($dados_plac->descricao) ? $dados_plac->descricao : "" ?>" type="text"/>
                            </label>

                            <label>Ativo
                                <select name="ativo" class="form-control">
                                    <option value="S" <?= isset($dados_plac) && $dados_plac->ativo == 'S' ? 'selected' : '' ?>>Sim</option>
                                    <option value="N" <?= isset($dados_plac) && $dados_plac->ativo == 'N' ? 'selected' : '' ?>>Não</option>
                                </select>
                            </label>

                            
                        </div>
                        <div class="form-column">
                            <label>Natureza
                                <select name="natureza" class="form-control">
                                    <option value="C" <?= isset($dados_plac) && $dados_plac->natureza == 'C' ? 'selected' : '' ?>>Credora</option>
                                    <option value="D" <?= isset($dados_plac) && $dados_plac->natureza == 'D' ? 'selected' : '' ?>>Devedora</option>
                                </select>
                            </label>
                            <label>Tipo de Contas
                                <select name="tipo" class="form-control">
                                    <option value="A" <?= isset($dados_plac) && $dados_plac->tipo == 'A' ? 'selected' : '' ?>>Ativo</option>
                                    <option value="PS" <?= isset($dados_plac) && $dados_plac->tipo == 'PS' ? 'selected' : '' ?>>Passivo</option>
                                    <option value="R" <?= isset($dados_plac) && $dados_plac->tipo == 'R' ? 'selected' : '' ?>>Receita</option>
                                    <option value="D" <?= isset($dados_plac) && $dados_plac->tipo == 'D' ? 'selected' : '' ?>>Despesa</option>
                                    <option value="PT" <?= isset($dados_plac) && $dados_plac->tipo == 'PT' ? 'selected' : '' ?>>Patrimônio Líquido</option>
                                </select>
                            </label>
                        </div>
                    </div>  
                    <label>Observação
                                <input name="observacao" value="<?= isset($dados_plac) && isset($dados_plac->observacao) ? $dados_plac->observacao : "" ?>" type="text"/>
                            </label>  
                </div>
    
                <?php if (isset($dados_plac)): ?>
                    <input type="hidden" name="id" value="<?= $dados_plac->id ?>">
                <?php endif; ?>

                <div class="form-buttons">
                    <button type="submit">
                        <?= isset($dados_plac) ? 'Alterar' : 'Cadastrar' ?>
                    </button>

                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/planoContas'">Consultar</button>
                    
                    <?php if (isset($dados_plac)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/planoContas/excluir?id=<?= $dados_plac->id ?>'">
                            Excluir
                        </button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
        