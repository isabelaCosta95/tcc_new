<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Cadastro Empresa</title>
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
            <h1>Cadastrar Empresa</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/empresa/salvar">
                <div class="form-section">
                    <h2>Dados Principais</h2>
                        <label>Razão social
                            <input name="descricao" value="<?= isset($dados_emp) && isset($dados_emp->descricao) ? $dados_emp->descricao : "" ?>" type="text"/>
                        </label>
                    <div class="form-row">
                        <div class="form-column">
                            <label>Nome Fantasia
                                <input name="descricao" value="<?= isset($dados_emp) && isset($dados_emp->descricao) ? $dados_emp->descricao : "" ?>" type="text"/>
                            </label>

                            <label>Email
                                <input name="descricao" value="<?= isset($dados_emp) && isset($dados_emp->descricao) ? $dados_emp->descricao : "" ?>" type="text"/>
                            </label>

                            <label>Telefone
                                <input name="descricao" value="<?= isset($dados_emp) && isset($dados_emp->descricao) ? $dados_emp->descricao : "" ?>" type="text"/>
                            </label>
                        </div>
                        <div class="form-column">
                            <label>Inscrição Municipal
                                <input name="descricao" value="<?= isset($dados_emp) && isset($dados_emp->descricao) ? $dados_emp->descricao : "" ?>" type="text"/>
                            </label>

                            <label>CNPJ
                                <input name="descricao" value="<?= isset($dados_emp) && isset($dados_emp->descricao) ? $dados_emp->descricao : "" ?>" type="text"/>
                            </label>

                            <label>Inscrição Estadual
                                <input name="descricao" value="<?= isset($dados_emp) && isset($dados_emp->descricao) ? $dados_emp->descricao : "" ?>" type="text"/>
                            </label>
                        </div>
                    </div>    
                </div>
                <div class="form-section">
                    <h2>Endereço</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label>Endereço
                                <input name="descricao" value="<?= isset($dados_emp) && isset($dados_emp->descricao) ? $dados_emp->descricao : "" ?>" type="text"/>
                            </label>

                            <label>Bairro
                                <input name="descricao" value="<?= isset($dados_emp) && isset($dados_emp->descricao) ? $dados_emp->descricao : "" ?>" type="text"/>
                            </label>

                            <label>Cidade
                                <select name="cidade" class="form-control" required>
                                    <option>Selecione</option>
                                    <?php for($i = 0; $i < $total_cidade; $i++): 
                                        $selecionado = "";
                                        if(isset($dados_emp->id))
                                            $selecionado = ($lista_cidade[$i]->codigo == $dados_emp->cidade) ? "selected" : "";
                                    ?>
                                        <option value="<?= $lista_cidade[$i]->codigo ?>" <?= $selecionado ?>>
                                            <?= $lista_cidade[$i]->descricao ?>
                                        </option>
                                    <?php endfor ?>
                                </select>
                            </label>
                        </div>
                        <div class="form-column">
                            <label>Número
                                <input name="descricao" value="<?= isset($dados_categ) && isset($dados_categ->descricao) ? $dados_categ->descricao : "" ?>" type="text"/>
                            </label>

                            <label>Complemento
                                <input name="descricao" value="<?= isset($dados_categ) && isset($dados_categ->descricao) ? $dados_categ->descricao : "" ?>" type="text"/>
                            </label>

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
                        </div>
                    </div>
                </div>

                <!-- Campo oculto para o ID (aparece apenas se houver um ID) -->
                <?php if (isset($dados_categ)): ?>
                    <input type="hidden" name="id" value="<?= $dados_categ->id ?>">
                <?php endif; ?>

                <div class="form-buttons">
                    <!-- Botão dinâmico -->
                    <button type="submit">
                        <?= isset($dados_categ) ? 'Alterar' : 'Cadastrar' ?>
                    </button>

                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/empresa'">Consultar</button>
                    
                    <?php if (isset($dados_categ)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/empresa/excluir?id=<?= $dados_categ->id ?>'">
                            Excluir
                        </button>
                    <?php endif; ?>
                </div>
            </form>

        </div>
    </div>
        