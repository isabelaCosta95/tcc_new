<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Cadastro de Motorista</title>
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
            <h1>Cadastrar Motorista</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/motorista/salvar">
                <div class="form-section">
                    <h2>Informações Pessoais</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label>Nome Completo
                                <input name="nome_completo" value="<?= isset($dados_mot) ? $dados_mot->nome_completo : "" ?>" maxlength="150" type="text" />
                            </label>
                            <label>CPF
                                <input name="cpf" id="cpf" value="<?= isset($dados_mot) ? $dados_mot->cpf : "" ?>" maxlength="18" type="text" oninput="formatarCNPJCPF(this)" />
                            </label>
                            <label>CNH
                                <input name="cnh" value="<?= isset($dados_mot) ? $dados_mot->cnh : "" ?>" maxlength="150" type="text" />
                            </label>
                        </div>
                        <div class="form-column">
                            <label>RG
                                <input name="rg" id="rg" value="<?= isset($dados_mot) ? $dados_mot->rg : "" ?>" type="text">
                            </label>
                            <label>Data de Nascimento
                                <input name="dt_nasc" value="<?= isset($dados_mot) ? $dados_mot->dt_nasc : "" ?>"type="date" />
                            </label>                            
                            <label>Data de Vencimento da CNH
                                <input name="dt_venc_cnh" id="dt_venc_cnh" value="<?= isset($dados_mot) ? $dados_mot->dt_venc_cnh : "" ?>" type="date" />
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Endereço</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label>Rua
                                <input name="endereco" value="<?= isset($dados_mot) ? $dados_mot->endereco : "" ?>" type="text" />
                            </label>
                            <label>Número
                                <input name="numero" value="<?= isset($dados_mot) ? $dados_mot->numero : "" ?>" type="text" />
                            </label>
                            <label>Bairro
                                <input name="bairro" value="<?= isset($dados_mot) ? $dados_mot->bairro : "" ?>" type="text" />
                            </label>
                        </div>
                        <div class="form-column">
                            <label>Estado
                                <select name="estado" class="form-control">
                                    <option>Selecione</option>
                                    <?php for($i = 0; $i < $total_estado; $i++): 
                                        $selecionado = "";
                                        if(isset($dados_mot->id))
                                            $selecionado = ($lista_estado[$i]->codigo == $dados_mot->fk_estado_motorista) ? "selected" : "";
                                    ?>
                                        <option value="<?= $lista_estado[$i]->codigo ?>" <?= $selecionado ?>>
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
                                        if(isset($dados_mot->id))
                                            $selecionado = ($lista_cidade[$i]->codigo == $dados_mot->fk_cidade) ? "selected" : "";
                                    ?>
                                        <option value="<?= $lista_cidade[$i]->codigo ?>" <?= $selecionado ?>>
                                            <?= $lista_cidade[$i]->descricao ?>
                                        </option>
                                    <?php endfor ?>
                                </select>
                            </label>
                            <label>Complemento
                                <input name="complemento" value="<?= isset($dados_mot) ? $dados_mot->complemento : "" ?>" type="text" />
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Adicionais</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label>Telefone
                                <input name="telefone" id="telefone" value="<?= isset($dados_mot) ? $dados_mot->telefone : "" ?>" type="text" oninput="formatarTelefone(this)" maxlength="15" />
                            </label>
                            <label>Chave Pix
                                <input name="chave_pix" id="chave_pix" value="<?= isset($dados_mot) ? $dados_mot->chave_pix : "" ?>" type="text" />
                            </label>
                        </div>
                        <div class="form-column">
                            <label>Ativo
                                <select name="ativo" class="form-control">
                                    <option value="S" <?= isset($dados_mot) && $dados_mot->ativo == 'S' ? 'selected' : '' ?>>Sim</option>
                                    <option value="N" <?= isset($dados_mot) && $dados_mot->ativo == 'N' ? 'selected' : '' ?>>Não</option>
                                </select>
                                <label>Email
                                <input name="email" id="email" value="<?= isset($dados_mot) ? $dados_mot->email : "" ?>" type="text" />
                            </label>
                            </label>
                        </div>
                    </div>
        
                    <label>Observação
                                <input name="observacao" value="<?= isset($dados_mot) ? $dados_mot->observacao : "" ?>" type="text" />
                            </label>
                </div>
                <!-- Campo oculto para o ID (aparece apenas se houver um ID) -->
                <?php if (isset($dados_mot)): ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($dados_mot->id) ?>">
                <?php endif; ?>

                <div class="form-buttons">
                    <!-- Botão dinâmico -->
                    <button type="submit">
                        <?= isset($dados_mot) ? 'Alterar' : 'Cadastrar' ?>
                    </button>

                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/motorista'">Consultar</button>
                    
                    <?php if (isset($dados_mot)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/motorista/excluir?id=<?= $dados_mot->id ?>'">
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