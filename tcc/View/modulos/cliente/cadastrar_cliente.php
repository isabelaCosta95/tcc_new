<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
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
            <h1>Cadastrar Cliente</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/cliente/salvar">
                <div class="form-section">
                    <h2>Informações Pessoais</h2>
                    <label>Razão Social
                                <input name="razao_social" value="<?= isset($dados_cli) ? $dados_cli->razao_social : "" ?>" maxlength="150" type="text" />
                            </label>
                    <div class="form-row">
                        <div class="form-column">
                            
                            <label>Nome Fantasia
                                <input name="nome_fantasia" value="<?= isset($dados_cli) ? $dados_cli->nome_fantasia : "" ?>" maxlength="150" type="text" />
                            </label>
                            <label>CNPJ | CPF
                                <input name="cnpj_cpf" id="cnpj_cpf" value="<?= isset($dados_cli) ? $dados_cli->cnpj_cpf : "" ?>" maxlength="18" type="text" oninput="formatarCNPJCPF(this)" />
                            </label>
                        </div>
                        <div class="form-column">
                            <label>Inscrição Estadual
                                <input name="inscricao_estadual" id="inscricao_estadual" value="<?= isset($dados_cli) ? $dados_cli->inscricao_estadual : "" ?>" type="text" maxlength="15" oninput="formatarInscricaoEstadual(this)" />
                            </label>
                            <label>Email
                                <input name="email" id="email" value="<?= isset($dados_cli) ? $dados_cli->email : "" ?>" type="text" />
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Endereço</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label>Rua
                                <input name="endereco" value="<?= isset($dados_cli) ? $dados_cli->endereco : "" ?>" type="text" />
                            </label>
                            <label>Número
                                <input name="numero" value="<?= isset($dados_cli) ? $dados_cli->numero : "" ?>" type="text" />
                            </label>
                            <label>Bairro
                                <input name="bairro" value="<?= isset($dados_cli) ? $dados_cli->bairro : "" ?>" type="text" />
                            </label>
                        </div>
                        <div class="form-column">
                            <label>Estado
                                <select name="estado" class="form-control" required>
                                    <option>Selecione</option>
                                    <?php for($i = 0; $i < $total_estado; $i++): 
                                        $selecionado = "";
                                        if(isset($dados_cli->id))
                                            $selecionado = ($lista_estado[$i]->codigo == $dados_cli->estado) ? "selected" : "";
                                    ?>
                                        <option value="<?= $lista_estado[$i]->codigo ?>" <?= $selecionado ?>>
                                            <?= $lista_estado[$i]->descricao ?>
                                        </option>
                                    <?php endfor ?>
                                </select>
                            </label>
                            <label>Cidade
                                <select name="cidade" class="form-control" required>
                                    <option>Selecione</option>
                                    <?php for($i = 0; $i < $total_cidade; $i++): 
                                        $selecionado = "";
                                        if(isset($dados_cli->id))
                                            $selecionado = ($lista_cidade[$i]->codigo == $dados_cli->cidade) ? "selected" : "";
                                    ?>
                                        <option value="<?= $lista_cidade[$i]->codigo ?>" <?= $selecionado ?>>
                                            <?= $lista_cidade[$i]->descricao ?>
                                        </option>
                                    <?php endfor ?>
                                </select>
                            </label>
                            <label>Complemento
                                <input name="complemento" value="<?= isset($dados_cli) ? $dados_cli->complemento : "" ?>" type="text" />
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Configurações do Sistema</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label>Observação
                                <input name="observacao" value="<?= isset($dados_cli) ? $dados_cli->observacao : "" ?>" type="text" />
                            </label>
                            <label>Ativo
                                <select name="ativo" class="form-control">
                                    <option value="S" <?= isset($dados_cli) && $dados_cli->ativo == 'S' ? 'selected' : '' ?>>Sim</option>
                                    <option value="N" <?= isset($dados_cli) && $dados_cli->ativo == 'N' ? 'selected' : '' ?>>Não</option>
                                </select>
                            </label>
                        </div>
                        <div class="form-column">
                            <label>Telefone 1
                                <input name="telefone1" id="telefone1" value="<?= isset($dados_cli) ? $dados_cli->telefone1 : "" ?>" type="text" oninput="formatarTelefone(this)" maxlength="15" />
                            </label>
                            <label>Telefone 2
                                <input name="telefone2" id="telefone2" value="<?= isset($dados_cli) ? $dados_cli->telefone2 : "" ?>" type="text" oninput="formatarTelefone(this)" maxlength="15" />
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Campo oculto para o ID (aparece apenas se houver um ID) -->
                <?php if (isset($dados_cli)): ?>
                    <input type="hidden" name="id" value="<?= $dados_cli->id ?>">
                <?php endif; ?>

                <div class="form-buttons">
                    <!-- Botão dinâmico -->
                    <button type="submit">
                        <?= isset($dados_cli) ? 'Alterar' : 'Cadastrar' ?>
                    </button>

                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/cliente'">Consultar</button>
                    
                    <?php if (isset($dados_cli)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/cliente/excluir?id=<?= $dados_cli->id ?>'">
                            Excluir
                        </button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>   
</body>
<script src="/tcc/View/includes/javascript/funcoes.js"></script>
</html>