<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Cadastro de Cliente</title>
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
            <h2>Cadastrar Cliente</h2>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/cliente/salvar">
                <div class="form-row">
                    <div class="form-column">
                        <label>Razão Social
                            <input name="razao_social" value="<?= isset($dados_cli) ? $dados_cli->razao_social : "" ?>" type="text" />
                        </label>

                        <label>Nome Fantasia
                            <input name="nome_fantasia" value="<?= isset($dados_cli) ? $dados_cli->nome_fantasia : "" ?>" type="text" />
                        </label>

                        <label>CNPJ | CPF
                            <input name="cnpj_cpf" value="<?= isset($dados_cli) ? $dados_cli->cnpj_cpf : "" ?>" type="text" />
                        </label>

                        <label>Inscrição Estadual
                            <input name="inscricao_estadual" value="<?= isset($dados_cli) ? $dados_cli->inscricao_estadual : "" ?>" type="text" />
                        </label>

                        <label>Endereço
                            <input name="endereco" value="<?= isset($dados_cli) ? $dados_cli->endereco : "" ?>" type="text" />
                        </label>

                        <label>Bairro
                            <input name="bairro" value="<?= isset($dados_cli) ? $dados_cli->bairro : "" ?>" type="text" />
                        </label>

                        <label>Complemento
                            <input name="complemento" value="<?= isset($dados_cli) ? $dados_cli->complemento : "" ?>" type="text" />
                        </label>
                    </div>
                    <div class="form-column">
                        <label>Número
                            <input name="numero" value="<?= isset($dados_cli) ? $dados_cli->numero : "" ?>" type="text" />
                        </label>

                        <label>Estado
                        <select name="estado" class="form-control">
                                <option>Selecione</option>
                                <?php for($i = 0; $i < $total_estado; $i++): 
                                    $selecionado = "";
                                    if(isset($dados_cli->id))
                                        $selecionado = ($lista_estado[$i]->id == $dados_cli->estado) ? "selected" : "";
                                ?>
                                    <option value="<?= $lista_estado[$i]->id ?>" <?= $selecionado ?>>
                                        <?= $lista_estado[$i]->descricao ?>
                                    </option>
                                <?php endfor ?>
                            </select>
                        </label>

                        <label>Cidade
                        <select name="cidade" class="form-control">
                                <option>Selecione</option>
                                <?php for($i = 0; $i < $total_cidade; $i++): 
                                    $selecionado = "";
                                    if(isset($dados_cli->id))
                                        $selecionado = ($lista_cidade[$i]->id == $dados_cli->cidade) ? "selected" : "";
                                ?>
                                    <option value="<?= $lista_cidade[$i]->id ?>" <?= $selecionado ?>>
                                        <?= $lista_cidade[$i]->descricao ?>
                                    </option>
                                <?php endfor ?>
                            </select>
                        </label>

                        <label>Telefone 1
                            <input name="telefone1" value="<?= isset($dados_cli) ? $dados_cli->telefone1 : "" ?>" type="text" />
                        </label>

                        <label>Telefone 2
                            <input name="telefone2" value="<?= isset($dados_cli) ? $dados_cli->telefone2 : "" ?>" type="text" />
                        </label>

                        <label>Observação
                            <input name="observacao" value="<?= isset($dados_cli) ? $dados_cli->observacao : "" ?>" type="text" />
                        </label>

                        <label>Ativo
                            <input name="ativo" value="<?= isset($dados_cli) ? $dados_cli->ativo : "" ?>" type="text" />
                        </label>

                        <label>Email
                            <input name="email" value="<?= isset($dados_cli) ? $dados_cli->email : "" ?>" type="text" />
                        </label>
                    </div>
                </div>

                <?php if (isset($dados_cli)): ?>
                    <input name="id" type="hidden" value="<?= isset($dados_cli) ? $dados_cli->id : "" ?>" />
                    <a href="/tcc/cliente/excluir?id=<?= isset($dados_cli) ? $dados_cli->id : "" ?>">Excluir</a>
                <?php endif ?>
                    
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </div>   
</body>
</html>