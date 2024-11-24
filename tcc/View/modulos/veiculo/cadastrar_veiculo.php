<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Cadastrar Veículo</title>
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
            <h2>Cadastro de Veículo</h2>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/veiculo/salvar">
                <div class="form-section">
                    <h2>Dados principais</h2>
                    <div class="form-row">
                        <div class="form-column">
                        <label>Nome do Proprietário
                            <input name="nome_prop" value="<?= isset($dados_veiculo) ? $dados_veiculo->nome_prop : "" ?>" type="text" class="form-control" />
                        </label>

                        <label>Marca / Modelo
                            <input name="marca_modelo" value="<?= isset($dados_veiculo) ? $dados_veiculo->marca_modelo : "" ?>" type="text" class="form-control" />
                        </label>

                        
                        </div>
                        <div class="form-column">
                        <label>Placa
                            <input name="placa" value="<?= isset($dados_veiculo) ? $dados_veiculo->placa : "" ?>" type="text" class="form-control" />
                        </label>

                        <label>Renavam
                            <input name="renavam" value="<?= isset($dados_veiculo) ? $dados_veiculo->renavam : "" ?>" type="text" class="form-control" />
                        </label>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Dados secundários</h2>
                    <div class="form-row">
                        <div class="form-column">
                        <label>RNTC
                            <input name="rntc" value="<?= isset($dados_veiculo) ? $dados_veiculo->rntc : "" ?>" type="text" class="form-control" />
                        </label>

                        <label>Chassi
                            <input name="chassi" value="<?= isset($dados_veiculo) ? $dados_veiculo->chassi : "" ?>" type="text" class="form-control" />
                        </label>

                        <label>Cor Predominante
                            <input name="cor" value="<?= isset($dados_veiculo) ? $dados_veiculo->cor : "" ?>" type="text" class="form-control" />
                        </label>

                        </div>
                        <div class="form-column">
                        <label>Combustível
                            <input name="combustivel" value="<?= isset($dados_veiculo) ? $dados_veiculo->combustivel : "" ?>" type="text" class="form-control" />
                        </label>                            

                        <label for="data_fabricacao"> Data de Fabricação
                            <input id="data_fabricacao" name="data_fabricacao" value="<?= isset($dados_veiculo) && isset($dados_veiculo->data_fabricacao) ? $dados_veiculo->data_fabricacao : date('Y-m-d') ?>" type="date" class="form-control" required />
                        </label>


                        <label for="data_licenciamento"> Data de Licenciamento
                            <input 
                                id="data_licenciamento" name="data_licenciamento" value="<?= isset($dados_veiculo) && isset($dados_veiculo->data_licenciamento) ? $dados_veiculo->data_licenciamento : date('Y-m-d') ?>" type="date" class="form-control" required />
                        </label>
                        
                        </div>
                    </div>
                </div>

                <div class="form-buttons">
                    <button type="submit">Cadastrar</button>
                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/veiculo'">Consultar</button>
                    <?php if (isset($dados_veiculo)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/veiculo/excluir?id=<?= $dados_veiculo->id ?>'">
                            Excluir
                        </button>
                    <?php endif ?>
                </div>
            </form>

        </div>
    </div>
</body>
</html>
