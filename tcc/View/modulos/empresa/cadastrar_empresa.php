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
            <h1>Empresa</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/empresa/salvar">
                <div class="form-section">
                    <h2>Dados Principais</h2>
                        <label>Razão social
                            <input name="razao_social" value="<?= isset($dados_emp) && isset($dados_emp->razao_social) ? $dados_emp->razao_social : "" ?>" type="text"/>
                        </label>
                    <div class="form-row">
                        <div class="form-column">
                            <label>Nome Fantasia
                                <input name="nome_fantasia" value="<?= isset($dados_emp) && isset($dados_emp->nome_fantasia) ? $dados_emp->nome_fantasia : "" ?>" type="text"/>
                            </label>

                            <label>Email
                                <input name="email" value="<?= isset($dados_emp) && isset($dados_emp->email) ? $dados_emp->email : "" ?>" type="text"/>
                            </label>

                            <label>Telefone
                                <input name="telefone" value="<?= isset($dados_emp) && isset($dados_emp->telefone) ? $dados_emp->telefone : "" ?>" type="text"/>
                            </label>
                        </div>
                        <div class="form-column">
                            <label>Inscrição Municipal
                                <input name="inscricao_municipal" value="<?= isset($dados_emp) && isset($dados_emp->inscricao_municipal) ? $dados_emp->inscricao_municipal : "" ?>" type="text"/>
                            </label>

                            <label>CNPJ
                                <input name="cnpj" value="<?= isset($dados_emp) && isset($dados_emp->cnpj) ? $dados_emp->cnpj : "" ?>" type="text"/>
                            </label>

                            <label>Inscrição Estadual
                                <input name="inscricao_estadual" value="<?= isset($dados_emp) && isset($dados_emp->ie) ? $dados_emp->ie : "" ?>" type="text"/>
                            </label>
                        </div>
                    </div>    
                </div>
                <div class="form-section">
                    <h2>Endereço</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label>Rua
                                <input name="endereco" value="<?= isset($dados_emp) && isset($dados_emp->endereco) ? $dados_emp->endereco : "" ?>" type="text"/>
                            </label>

                            <label>Bairro
                                <input name="bairro" value="<?= isset($dados_emp) && isset($dados_emp->bairro) ? $dados_emp->bairro : "" ?>" type="text"/>
                            </label>

                            <label>Cidade
                                <select name="id_cidade" class="form-control" required>
                                    <option>Selecione</option>
                                    <?php for($i = 0; $i < $total_cidade; $i++): 
                                        $selecionado = "";
                                        if(isset($dados_emp->id))
                                            $selecionado = ($lista_cidade[$i]->id == $dados_emp->id_cidade) ? "selected" : "";
                                    ?>
                                        <option value="<?= $lista_cidade[$i]->id ?>" <?= $selecionado ?>>
                                            <?= $lista_cidade[$i]->descricao ?>
                                        </option>
                                    <?php endfor ?>
                                </select>
                            </label>
                        </div>
                        <div class="form-column">
                            <label>Número
                                <input name="numero" value="<?= isset($dados_emp) && isset($dados_emp->numero) ? $dados_emp->numero : "" ?>" type="text"/>
                            </label>

                            <label>Complemento
                                <input name="complemento" value="<?= isset($dados_emp) && isset($dados_emp->complemento) ? $dados_emp->complemento : "" ?>" type="text"/>
                            </label>

                            <label>Estado
                                <select name="id_estado" class="form-control" required>
                                    <option>Selecione</option>
                                    <?php for($i = 0; $i < $total_estado; $i++): 
                                        $selecionado = "";
                                        if(isset($dados_emp->id))
                                            $selecionado = ($lista_estado[$i]->id == $dados_emp->id_estado) ? "selected" : "";
                                    ?>
                                        <option value="<?= $lista_estado[$i]->id ?>" <?= $selecionado ?>>
                                            <?= $lista_estado[$i]->descricao ?>
                                        </option>
                                    <?php endfor ?>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Campo oculto para o ID (aparece apenas se houver um ID) -->
                <?php if (isset($dados_emp)): ?>
                    <input type="hidden" name="id" value="<?= $dados_emp->id ?>">
                <?php endif; ?>

                <div class="form-buttons">
                    <!-- Botão dinâmico -->
                    <button type="submit">
                        <?= isset($dados_emp) ? 'Alterar' : 'Cadastrar' ?>
                    </button>

                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/empresa'">Consultar</button>
                    
                    <?php if (isset($dados_emp)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/empresa/excluir?id=<?= $dados_emp->id ?>'">
                            Excluir
                        </button>
                    <?php endif; ?>
                </div>
            </form>

        </div>
    </div>
        