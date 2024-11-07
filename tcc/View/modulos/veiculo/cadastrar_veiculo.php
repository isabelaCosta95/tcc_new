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
            <h2>Cadastrar Veículo</h2>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/veiculo/salvar">
                <div class="form-row">
                    <div class="form-column">
                        <label>Nome do Proprietário
                            <input name="nome_prop" value="<?= isset($dados_veiculo) ? $dados_veiculo->nome_prop : "" ?>" type="text" class="form-control" />
                        </label>

                        <label>Marca / Modelo
                            <input name="marca_modelo" value="<?= isset($dados_veiculo) ? $dados_veiculo->marca_modelo : "" ?>" type="text" class="form-control" />
                        </label>

                        <label>Placa
                            <input name="placa" value="<?= isset($dados_veiculo) ? $dados_veiculo->placa : "" ?>" type="text" class="form-control" />
                        </label>

                        <label>RNTC
                            <input name="rntc" value="<?= isset($dados_veiculo) ? $dados_veiculo->rntc : "" ?>" type="text" class="form-control" />
                        </label>

                        <label>Chassi
                            <input name="chassi" value="<?= isset($dados_veiculo) ? $dados_veiculo->chassi : "" ?>" type="text" class="form-control" />
                        </label>
                    </div>

                    <div class="form-column">
                        <label>Renavam
                            <input name="renavam" value="<?= isset($dados_veiculo) ? $dados_veiculo->renavam : "" ?>" type="text" class="form-control" />
                        </label>

                        <label>Cor Predominante
                            <input name="cor" value="<?= isset($dados_veiculo) ? $dados_veiculo->cor : "" ?>" type="text" class="form-control" />
                        </label>

                        <label>Combustível
                            <input name="combustivel" value="<?= isset($dados_veiculo) ? $dados_veiculo->combustivel : "" ?>" type="text" class="form-control" />
                        </label>

                        <label>Data de Fabricação
                            <input name="data_fabricacao" value="<?= isset($dados_veiculo) ? $dados_veiculo->data_fabricacao : "" ?>" type="date" class="form-control" />
                        </label>

                        <label>Data de Licenciamento
                            <input name="data_licenciamento" value="<?= isset($dados_veiculo) ? $dados_veiculo->data_licenciamento : "" ?>" type="date" class="form-control" />
                        </label>
                    </div>
                </div>
                
                <?php if (isset($dados_veiculo)): ?>
                    <input name="codigo" type="hidden" value="<?= isset($dados_veiculo->codigo) ? $dados_veiculo->codigo : "" ?>"/>
                    <a href="/tcc/veiculo/excluir?id=<?= isset($dados_veiculo->codigo) ? $dados_veiculo->codigo : "" ?>">Excluir</a>
                <?php endif; ?>
                <button type="submit">Cadastrar</button>                
            </form>
        </div>
    </div>
</body>
</html>
