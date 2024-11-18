<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Cadastro Contas a Pagar</title>
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
            <h1>Cadastrar Contas a Pagar</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/contasPagar/salvar">
                <div class="form-section">
                    <h2>Dados da conta</h2>
                        <label for="descricao">
                                <i class="fas fa-file-alt"></i> Descrição
                                <input id="descricao" name="descricao" value="<?= isset($dados_pagar) && isset($dados_pagar->descricao) ? $dados_pagar->descricao : "" ?>" type="text" required/>
                            </label>
                    <div class="form-row">
                    
                        <div class="form-column">
                            <label for="dt_vencimento">
                                <i class="fas fa-calendar-alt"></i> Data de Vencimento
                                <input id="dt_vencimento" name="dt_vencimento" value="<?= isset($dados_pagar) && isset($dados_pagar->dt_vencimento) ? $dados_pagar->dt_vencimento : date('Y-m-d') ?>" type="date" required/>
                            </label>


                            <label for="plano_contas">
                                <i class="fas fa-credit-card"></i> Plano de Contas
                                <select id="plano_contas" name="plano_contas" class="form-control" required>
                                    <option value="">Selecione</option>
                                    <?php foreach ($plano_contas as $planoC): ?>
                                        <option value="<?= $planoC['id'] ?>" 
                                            <?= isset($dados_pagar) && $dados_pagar->plano_contas == $planoC['id'] ? 'selected' : '' ?>>
                                            <?= $planoC['descricao'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </label>
                        </div>
                        <div class="form-column">
                            <label for="valor">
                                <i class="fas fa-dollar-sign"></i> Valor Total
                                <input id="valor" name="valor" value="<?= isset($dados_pagar) && isset($dados_pagar->valor) ? $dados_pagar->valor : "" ?>" type="text" required oninput="formatarValor(this)" />
                            </label>

                            <label for="cliente">Cliente
                                <select id="cliente" name="cliente" class="form-control">
                                    <option>Selecione</option>
                                    <?php for ($i = 0; $i < $total_cli; $i++): 
                                        $selecionado = "";
                                        if (isset($dados_pagar->id)) 
                                            $selecionado = ($lista_cli[$i]->id == $dados_pagar->cliente) ? "selected" : "";
                                    ?>
                                        <option value="<?= $lista_cli[$i]->id ?>" <?= $selecionado ?>>
                                            <?= $lista_cli[$i]->razao_social ?>
                                        </option>
                                    <?php endfor ?>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <h2>Pagamento</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label for="dt_pagamento">
                                <i class="fas fa-calendar-check"></i> Data do Pagamento
                                <input id="dt_pagamento" name="dt_pagamento" value="<?= isset($dados_pagar) && isset($dados_pagar->dt_pagamento) ? $dados_pagar->dt_pagamento : date('Y-m-d') ?>" type="date" required/>
                            </label>

                            <label for="stts">
                                <i class="fas fa-check-circle"></i> Status
                                <select name="stts" class="form-control">
                                    <option value="" <?= !isset($dados_pagar) || empty($dados_pagar->stts) ? 'selected' : '' ?>>Selecione</option>
                                    <option value="A" <?= isset($dados_pagar) && $dados_pagar->stts == "A" ? 'selected' : '' ?>>Aberta</option>
                                    <option value="P" <?= isset($dados_pagar) && $dados_pagar->stts == "P" ? 'selected' : '' ?>>Paga</option>
                                    <option value="C" <?= isset($dados_pagar) && $dados_pagar->stts == "C" ? 'selected' : '' ?>>Cancelada</option>
                                </select>
                            </label>
                        </div>
                        <div class="form-column">
                            <label for="form_pagamento">
                                <i class="fas fa-credit-card"></i> Forma de Pagamento
                                <select id="form_pagamento" name="form_pagamento" class="form-control">
                                    <option value="">Selecione</option>
                                    <?php foreach ($formas_pagamento as $forma): ?>
                                        <option value="<?= $forma['id'] ?>" 
                                            <?= isset($dados_pagar) && $dados_pagar->form_pagamento == $forma['id'] ? 'selected' : '' ?>>
                                            <?= $forma['descricao'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </label>

                            <label for="qnt_parcelas">
                                <i class="fas fa-file-alt"></i> Parcelas
                                <input id="qnt_parcelas" name="qnt_parcelas" value="<?= isset($dados_pagar) && isset($dados_pagar->qnt_parcelas) ? $dados_pagar->qnt_parcelas : "" ?>" type="text" required/>
                            </label>
                        </div>
                    </div>
                    <label for="observacao">
                                <i class="fas fa-comment-alt"></i> Observação
                                <input id="observacao" name="observacao" value="<?= isset($dados_pagar) && isset($dados_pagar->observacao) ? $dados_pagar->observacao : "" ?>" type="text"/>
                            </label>
                </div>

                <div class="form-buttons">
                    <button type="submit">Cadastrar</button>
                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/contasPagar'">Consultar</button>
                    <?php if (isset($dados_pagar)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/contasPagar/excluir?id=<?= $dados_pagar->id ?>'">
                            Excluir
                        </button>
                    <?php endif ?>
                </div>

            </form>
        </div>
    </div>
</body>
<script src="/tcc/View/includes/javascript/funcoes.js"></script>
</html>
