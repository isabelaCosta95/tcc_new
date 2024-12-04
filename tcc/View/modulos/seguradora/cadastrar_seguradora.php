<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Cadastro Seguradora</title>
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
            <h1>Cadastrar Seguradora</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/seguradora/salvar">
                <div class="form-section">
                    <h2>Dados</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label>Nome
                                <input name="nome" value="<?= isset($dados_seg) && isset($dados_seg->nome) ? $dados_seg->nome : "" ?>" type="text"/>
                            </label>

                            <label>CNPJ
                                <input name="cnpj" value="<?= isset($dados_seg) && isset($dados_seg->cnpj) ? $dados_seg->cnpj : "" ?>" type="text"/>
                            </label>

                            <label>Email
                                <input name="email" value="<?= isset($dados_seg) && isset($dados_seg->email) ? $dados_seg->email : "" ?>" type="text"/>
                            </label>
                        </div>
                        <div class="form-column">
                            <label>Inscrição Estadual
                                <input name="inscricao_estadual" value="<?= isset($dados_seg) && isset($dados_seg->inscricao_estadual) ? $dados_seg->inscricao_estadual : "" ?>" type="text"/>
                            </label>

                            <label>Contato
                                <input name="contato" value="<?= isset($dados_seg) && isset($dados_seg->contato) ? $dados_seg->contato : "" ?>" type="text"/>
                            </label>

                            <label>Telefone
                                <input name="telefone" value="<?= isset($dados_seg) && isset($dados_seg->telefone) ? $dados_seg->telefone : "" ?>" type="text"/>
                            </label>
                        </div>
                    </div>    
                </div>

                <!-- Campo oculto para o ID (aparece apenas se houver um ID) -->
                <?php if (isset($dados_seg)): ?>
                    <input type="hidden" name="id" value="<?= $dados_seg->id ?>">
                <?php endif; ?>

                <div class="form-buttons">
                    <!-- Botão dinâmico -->
                    <button type="submit">
                        <?= isset($dados_seg) ? 'Alterar' : 'Cadastrar' ?>
                    </button>

                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/seguradora'">Consultar</button>
                    
                    <?php if (isset($dados_seg)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/seguradora/excluir?id=<?= $dados_seg->id ?>'">
                            Excluir
                        </button>
                    <?php endif; ?>
                </div>
            </form>

        </div>
    </div>
        