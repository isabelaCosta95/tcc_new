<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Cadastro Veículo</title>
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
            <h1>Veículo</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/veiculo/salvar">
                <div class="form-section">
                    <h2>Dados Principais</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label>Nome Proprietário
                                <input name="nome_proprietario" value="<?= isset($dados_veiculo) && isset($dados_veiculo->nome_proprietario) ? $dados_veiculo->nome_proprietario : "" ?>" type="text"/>
                            </label>

                            <label>Marca
                                <input name="marca" value="<?= isset($dados_veiculo) && isset($dados_veiculo->marca) ? $dados_veiculo->marca : "" ?>" type="text"/>
                            </label>
                            
                        </div>
                        <div class="form-column">

                        <label>Placa
                                <input name="placa" value="<?= isset($dados_veiculo) && isset($dados_veiculo->placa) ? $dados_veiculo->placa : "" ?>" type="text"/>
                            </label>

                            <label>Renavam
                                <input name="renavam" value="<?= isset($dados_veiculo) && isset($dados_veiculo->renavam) ? $dados_veiculo->renavam : "" ?>" type="text"/>
                            </label>

                        </div>
                    </div>  
                </div>
                <div class="form-section">
                    <h2>Dados Secundários</h2>
                    <div class="form-row">
                        <div class="form-column">
                        <label>RNTC
                                <input name="rntc" value="<?= isset($dados_veiculo) && isset($dados_veiculo->rntc) ? $dados_veiculo->rntc : "" ?>" type="text"/>
                            </label>

                            <label>Chassi
                                <input name="chassi" value="<?= isset($dados_veiculo) && isset($dados_veiculo->chassi) ? $dados_veiculo->chassi : "" ?>" type="text"/>
                            </label>

                            <label>Cor Predominante
                                <input name="cor" value="<?= isset($dados_veiculo) && isset($dados_veiculo->cor) ? $dados_veiculo->cor : "" ?>" type="text"/>
                            </label>


                            
                        </div>
                        <div class="form-column">
                        <label>Combustível
                                <input name="combustivel" value="<?= isset($dados_veiculo) && isset($dados_veiculo->combustivel) ? $dados_veiculo->combustivel : "" ?>" type="text"/>
                            </label>

                            <label for="dt_fabricacao"> Data de Fabricação
                                <input id="dt_fabricacao" name="dt_fabricacao" value="<?= isset($dados_veiculo) && isset($dados_veiculo->dt_fabricacao) ? $dados_veiculo->dt_fabricacao : date('Y-m-d') ?>" type="date" required/>
                            </label>
                            <label for="dt_licenciamento">Data de Licenciamento
                                <input id="dt_licenciamento" name="dt_licenciamento" value="<?= isset($dados_veiculo) && isset($dados_veiculo->dt_licenciamento) ? $dados_veiculo->dt_licenciamento : date('Y-m-d') ?>" type="date" required/>
                            </label>

                        </div>
                    </div>  
                </div>
    
                <?php if (isset($dados_veiculo)): ?>
                    <input type="hidden" name="id" value="<?= $dados_veiculo->id ?>">
                <?php endif; ?>

                <div class="form-buttons">
                    <button type="submit">
                        <?= isset($dados_veiculo) ? 'Alterar' : 'Cadastrar' ?>
                    </button>

                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/veiculo'">Consultar</button>
                    
                    <?php if (isset($dados_veiculo)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/veiculo/excluir?id=<?= $dados_veiculo->id ?>'">
                            Excluir
                        </button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
        