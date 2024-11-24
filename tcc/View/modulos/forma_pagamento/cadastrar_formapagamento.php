<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Cadastro Forma de Pagamento</title>
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
            <h1>Cadastrar Forma de Pagamentos</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/formaPagamento/salvar">
                <div class="form-section">
                    <h2>Dados</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label>Descrição
                                <input name="descricao" value="<?= isset($dados_fpag) && isset($dados_fpag->descricao) ? $dados_fpag->descricao : "" ?>" type="text"/>
                            </label>
                        </div>
                        <div class="form-column">
                        <label>Ativo
                                <select name="ativo" class="form-control">
                                    <option value="S" <?= isset($dados_fpag) && $dados_fpag->ativo == 'S' ? 'selected' : '' ?>>Sim</option>
                                    <option value="N" <?= isset($dados_fpag) && $dados_fpag->ativo == 'N' ? 'selected' : '' ?>>Não</option>
                                </select>
                            </label>
                        </div>
                    </div>    
                </div>

                <!-- Campo oculto para o ID (aparece apenas se houver um ID) -->
                <?php if (isset($dados_fpag)): ?>
                    <input type="hidden" name="id" value="<?= $dados_fpag->id ?>">
                <?php endif; ?>

                <div class="form-buttons">
                    <!-- Botão dinâmico -->
                    <button type="submit">
                        <?= isset($dados_fpag) ? 'Alterar' : 'Cadastrar' ?>
                    </button>

                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/formaPagamento'">Consultar</button>
                    
                    <?php if (isset($dados_fpag)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/formaPagamento/excluir?id=<?= $dados_fpag->id ?>'">
                            Excluir
                        </button>
                    <?php endif; ?>
                </div>
            </form>

        </div>
    </div>
        