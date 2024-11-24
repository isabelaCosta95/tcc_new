<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">  
    <title>Cadastro de Produto</title>  
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
            <h1>Cadastrar Produto</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/produto/salvar">
                <div class="form-section">
                    <h2>Descrição</h2>
                    <label for="descricao">Descrição
                                <input id="descricao" name="descricao" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->descricao : "" ?>" />
                            </label>
                    <div class="form-row">
                        
                        <div class="form-column">
                            <label for="marca">Marca
                                <input id="marca" name="marca" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->marca : "" ?>" />
                            </label>

                            <label for="unidade">Unidade de venda
                                <select id="unidade" required name="unidade" class="form-control">
                                    <option value="">Selecione</option>
                                    <?php foreach ($unidade_venda as $unid): ?>
                                        <option value="<?= $unid['id'] ?>" 
                                            <?= isset($dados_prod) && $dados_prod->unidade == $unid['id'] ? 'selected' : '' ?>>
                                            <?= $unid['descricao'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </label>

                            <label for="validade">Validade
                                <input id="validade" name="validade" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->validade : "" ?>" />
                            </label>
                        </div>
                        <div class="form-column">
                            <label for="preco">Preço
                                <input id="preco" name="preco" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->preco : "" ?>" />
                            </label>

                            <label for="id_categoria ">Categoria
                                <select id="id_categoria" name="id_categoria" class="form-control" required>
                                    <option>Selecione</option>
                                    <?php for ($i = 0; $i < $total_categ; $i++): 
                                        $selecionado = "";
                                        if (isset($dados_prod->id)) 
                                            $selecionado = ($lista_categ[$i]->id == $dados_prod->id_categoria) ? "selected" : "";
                                    ?>
                                        <option value="<?= $lista_categ[$i]->id ?>" <?= $selecionado ?>>
                                            <?= $lista_categ[$i]->descricao ?>
                                        </option>
                                    <?php endfor ?>
                                </select>
                            </label>

                            <label for="codigo_barras">Código de barras
                                <input id="codigo_barras" name="codigo_barras" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->codigo_barras : "" ?>" />
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Tributação</h2>
                    <div class="form-row">
                        <div class="form-column">
                        <label for="ncm">NCM
                            <input id="ncm" name="ncm" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->ncm : "" ?>" />
                        </label>

                        <label for="cfop">CFOP
                            <input id="cfop" name="cfop" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->cfop : "" ?>" />
                        </label>

                        <label for="pis">PIS
                            <input id="pis" name="pis" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->pis : "" ?>" />
                        </label>

                        <label for="cofins">COFINS
                            <input id="cofins" name="cofins" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->cofins : "" ?>" />
                        </label>
                        <label for="icms_cst">ICMS | CST
                            <input id="icms_cst" name="icms_cst" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->icms_cst : "" ?>" />
                        </label>

                        <label for="aliquota_pis">Alíquota PIS
                            <input id="aliquota_pis" name="aliquota_pis" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->aliquota_pis : "" ?>" />
                        </label>

                        <label for="aliquota_cofins">Aliquota COFINS
                            <input id="aliquota_cofins" name="aliquota_cofins" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->aliquota_cofins : "" ?>" />
                        </label>

                        </div>
                        <div class="form-column">
                        <label for="aliquota_icms">Aliquota ICMS
                            <input id="aliquota_icms" name="aliquota_icms" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->aliquota_icms : "" ?>" />
                        </label>

                        <label for="ipi">IPI
                            <input id="ipi" name="ipi" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->ipi : "" ?>" />
                        </label>

                        <label for="aliquota_reducao_bc">Alíquota Redução Base de Calculo
                            <input id="aliquota_reducao_bc" name="aliquota_reducao_bc" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->aliquota_reducao_bc : "" ?>" />
                        </label>

                        <label for="origem_icms">Origem ICMS
                            <input id="origem_icms" name="origem_icms" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->origem_icms : "" ?>" />
                        </label>

                        <label for="cest">CEST
                            <input id="cest" name="cest" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->cest : "" ?>" />
                        </label>

                        <label for="gtin">GTIN
                            <input id="gtin" name="gtin" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->gtin : "" ?>" />
                        </label>

                        <label for="aliquota_mva">Alíquota MVA
                            <input id="aliquota_mva" name="aliquota_mva" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->aliquota_mva : "" ?>" />
                        </label>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Configurações do sistema</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label for="estoque">Estoque
                                <input id="estoque" name="estoque" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->estoque : "" ?>" />
                            </label>
                        </div>
                        <div class="form-column">
                            <label>Ativo
                                <select name="ativo" class="form-control">
                                    <option value="S" <?= isset($dados_prod) && $dados_prod->ativo == 'S' ? 'selected' : '' ?>>Sim</option>
                                    <option value="N" <?= isset($dados_prod) && $dados_prod->ativo == 'N' ? 'selected' : '' ?>>Não</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <label for="observacao">Observação
                    <input id="observacao" name="observacao" type="text" class="form-control" value="<?= isset($dados_prod) ? $dados_prod->observacao : "" ?>" />
                </label>
                </div>
                

                <div class="form-buttons">
                    <button type="submit">Cadastrar</button>
                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/produto'">Consultar</button>
                    <?php if (isset($dados_prod)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/produto/excluir?id=<?= $dados_prod->id ?>'">
                            Excluir
                        </button>
                    <?php endif ?>
                </div>
            </form>
        </div>
    </div>
</body>
</html>