<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Cadastro Cidade</title>
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
            <h1>Cadastrar Cidade</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/cidade/salvar">
                <div class="form-section">
                    <h2>Dados</h2>
                    <label>Descrição
                                <input name="descricao" value="<?= isset($dados_cid) && isset($dados_cid->descricao) ? $dados_cid->descricao : "" ?>" type="text"/>
                            </label>
                    <div class="form-row">
                        <div class="form-column">
                            <label>Estado
                                <select name="estado" class="form-control" required>
                                    <option>Selecione</option>
                                    <?php for($i = 0; $i < $total_estado; $i++): 
                                        $selecionado = "";
                                        if(isset($dados_cid->id))
                                            $selecionado = ($lista_estado[$i]->codigo == $dados_cid->estado) ? "selected" : "";
                                    ?>
                                        <option value="<?= $lista_estado[$i]->codigo ?>" <?= $selecionado ?>>
                                            <?= $lista_estado[$i]->descricao ?>
                                        </option>
                                    <?php endfor ?>
                                </select>
                            </label>

                        </div>
                        <div class="form-column">
                            <label>Código IBGE
                                <input name="ibge" value="<?= isset($dados_cid) && isset($dados_cid->ibge) ? $dados_cid->ibge : "" ?>" type="text"/>
                            </label>
                        </div>
                    </div>    
                </div>

                <!-- Campo oculto para o ID (aparece apenas se houver um ID) -->
                <?php if (isset($dados_cid)): ?>
                    <input type="hidden" name="id" value="<?= $dados_cid->id ?>">
                <?php endif; ?>

                <div class="form-buttons">
                    <!-- Botão dinâmico -->
                    <button type="submit">
                        <?= isset($dados_cid) ? 'Alterar' : 'Cadastrar' ?>
                    </button>

                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/cidade'">Consultar</button>
                    
                    <?php if (isset($dados_cid)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/cidade/excluir?id=<?= $dados_cid->id ?>'">
                            Excluir
                        </button>
                    <?php endif; ?>
                </div>
            </form>

        </div>
    </div>
        