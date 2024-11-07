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
            <h2>Cadastrar Contas a Pagar</h2>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/contasPagar/salvar">
                <div class="form-row">
                    <div class="form-column">
                        <label for="descricao">
                            <i class="fas fa-file-alt"></i> Descrição
                            <input id="descricao" name="descricao" value="<?= isset($dados_pagar) && isset($dados_pagar->descricao) ? $dados_pagar->descricao : "" ?>" type="text" required/>
                        </label>

                        <label for="dt_vencimento">
                            <i class="fas fa-calendar-alt"></i> Data de Vencimento
                            <input id="dt_vencimento" name="dt_vencimento" value="<?= isset($dados_pagar) && isset($dados_pagar->dt_vencimento) ? $dados_pagar->dt_vencimento : "" ?>" type="date" required/>
                        </label>

                        <label for="valor">
                            <i class="fas fa-dollar-sign"></i> Valor Total
                            <input id="valor" name="valor" value="<?= isset($dados_pagar) && isset($dados_pagar->valor) ? $dados_pagar->valor : "" ?>" type="text" required/>
                        </label>

                        <label for="stts">
                            <i class="fas fa-check-circle"></i> Status
                            <input id="stts" name="stts" value="<?= isset($dados_pagar) && isset($dados_pagar->stts) ? $dados_pagar->stts : "" ?>" type="text" required/>
                        </label>

                        <label for="qnt_parcelas">
                            <i class="fas fa-th-list"></i> Parcelas
                            <input id="qnt_parcelas" name="qnt_parcelas" value="<?= isset($dados_pagar) && isset($dados_pagar->qnt_parcelas) ? $dados_pagar->qnt_parcelas : "" ?>" type="text" required/>
                        </label>
                    </div>
                    <div class="form-column">
                        <label for="dt_pagamento">
                            <i class="fas fa-calendar-check"></i> Data do Pagamento
                            <input id="dt_pagamento" name="dt_pagamento" value="<?= isset($dados_pagar) && isset($dados_pagar->dt_pagamento) ? $dados_pagar->dt_pagamento : "" ?>" type="date" required/>
                        </label>

                        <label for="form_pagamento">
                            <i class="fas fa-credit-card"></i> Forma de Pagamento
                            <input id="form_pagamento" name="form_pagamento" value="<?= isset($dados_pagar) && isset($dados_pagar->form_pagamento) ? $dados_pagar->form_pagamento : "" ?>" type="text" required/>
                        </label>

                        <label for="plano_contas">
                            <i class="fas fa-list-alt"></i> Plano de Contas
                            <input id="plano_contas" name="plano_contas" value="<?= isset($dados_pagar) && isset($dados_pagar->plano_contas) ? $dados_pagar->plano_contas : "" ?>" type="text" required/>
                        </label>

                        <label for="observacao">
                            <i class="fas fa-comment-alt"></i> Observação
                            <input id="observacao" name="observacao" value="<?= isset($dados_pagar) && isset($dados_pagar->observacao) ? $dados_pagar->observacao : "" ?>" type="text"/>
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

                <?php if (isset($dados_pagar)): ?>
                    <input name="id" type="hidden" value="<?= isset($dados_pagar->id) ? $dados_pagar->id : "" ?>"/>
                    <a href="/tcc/contasPagar/excluir?id=<?= isset($dados_pagar->id) ? $dados_pagar->id : "" ?>">Excluir</a>
                <?php endif; ?>

                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
</body>
</html>
