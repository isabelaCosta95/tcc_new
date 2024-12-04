<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Cadastro Carga</title>
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
            <h1>Lançamento de Carga</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/carga/salvar">
                <div class="form-section">
                    <h2>Dados</h2>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        
                        <label for="id_produto" style="margin: 0; flex-grow: 1;">Produto
                            <select id="id_produto" name="id_produto" class="form-control" style="width: 100%;">
                                <option>Selecione</option>
                                <?php for ($i = 0; $i < $total_prod; $i++):
                                    $selecionado = "";
                                    if (isset($dados_prod->id))
                                        $selecionado = ($lista_prod[$i]->id == $dados_prod->id_produto) ? "selected" : "";
                                ?>
                                    <option value="<?= $lista_prod[$i]->id ?>" <?= $selecionado ?>>
                                        <?= $lista_prod[$i]->descricao ?>
                                    </option>
                                <?php endfor ?>
                            </select>
                        </label>

                        <img src="/tcc/View/includes/imagem/adicionar.png" alt="Adicionar" style="width: 35px; height: auto; cursor: pointer;" />

                    </div>
                    <div class="form-row">
                        <div class="form-column">

                            <label>Valor total
                                <input name="valor_total" value="<?= isset($dados_car) && isset($dados_car->valor_total) ? $dados_car->valor_total : "" ?>" type="text" autocomplete="off"/>
                            </label>

                            <label for="id_seguradora">Seguradora
                                <select id="id_seguradora" name="id_seguradora" class="form-control">
                                    <option>Selecione</option>
                                    <?php for ($i = 0; $i < $total_seg; $i++):
                                        $selecionado = "";
                                        if (isset($dados_seg->id))
                                            $selecionado = ($lista_seg[$i]->id == $dados_seg->id_seguradora) ? "selected" : "";
                                    ?>
                                        <option value="<?= $lista_seg[$i]->id ?>" <?= $selecionado ?>>
                                            <?= $lista_seg[$i]->nome ?>
                                        </option>
                                    <?php endfor ?>
                                </select>
                            </label>

                            <label for="id_cliente">Cliente
                                <select id="id_cliente" name="id_cliente" class="form-control">
                                    <option>Selecione</option>
                                    <?php for ($i = 0; $i < $total_cli; $i++):
                                        $selecionado = "";
                                        if (isset($dados_cli->id))
                                            $selecionado = ($lista_cli[$i]->id == $dados_cli->id_cliente) ? "selected" : "";
                                    ?>
                                        <option value="<?= $lista_cli[$i]->id ?>" <?= $selecionado ?>>
                                            <?= $lista_cli[$i]->razao_social ?>
                                        </option>
                                    <?php endfor ?>
                                </select>
                            </label>

                        </div>
                        <div class="form-column">

                            <label>Quantidade
                                <input name="quantidade" value="<?= isset($dados_car) && isset($dados_car->quantidade) ? $dados_car->quantidade : "" ?>" type="text" autocomplete="off"/>
                            </label>

                            <label>Número do seguro
                                <input name="nmr_seguro" value="<?= isset($dados_car) && isset($dados_car->nmr_seguro) ? $dados_car->nmr_seguro : "" ?>" type="text" autocomplete="off"/>
                            </label>

                            <label>Status
                                <input name="status" value="<?= isset($dados_car) && isset($dados_car->status) ? $dados_car->status : "" ?>" type="text" readonly autocomplete="off"/>
                            </label>

                        </div>
                    </div>
                </div>

                <?php if (isset($dados_car)): ?>
                    <input type="hidden" name="id" value="<?= $dados_car->id ?>">
                <?php endif; ?>

                <div class="form-buttons">
                    <button type="submit">
                        <?= isset($dados_car) ? 'Alterar' : 'Cadastrar' ?>
                    </button>
                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/carga'">Consultar</button>
                    <button type="button" class="btn-associar" onclick="window.location.href='/tcc/carga'">Associar Viagem</button>
                    <button type="button" class="btn-receber" onclick="window.location.href='/tcc/carga'">Contas a Receber</button>
                    <?php if (isset($dados_car)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/carga/excluir?id=<?= $dados_car->id ?>'">
                            Excluir
                        </button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</body>