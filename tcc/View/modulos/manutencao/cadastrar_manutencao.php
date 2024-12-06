<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">  
    <title>Cadastro de Manutenção</title>  
    <style>
        .peca-row {
            display: flex;
            gap: 10px;
            margin-bottom: 10px; 
            align-items: center;
        }

        .peca-row input {
            flex: 1; 
        }

        .peca-row .btn-remover {
            padding: 10px 10px;
            color: white;
            background-color: red;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: -18px; 
        }
    </style>

<script>
        document.addEventListener('DOMContentLoaded', () => {
            const botaoAdicionar = document.getElementById('adicionar-peca');
            const container = document.getElementById('peca-container');

            botaoAdicionar.addEventListener('click', () => {
                const divPeca = document.createElement('div');
                divPeca.classList.add('peca-row');

                const inputPeca = document.createElement('input');
                inputPeca.type = 'text';
                inputPeca.name = 'peca[]';
                inputPeca.placeholder = 'Peca';
                inputPeca.classList.add('form-control');

                const inputQuantidade = document.createElement('input');
                inputQuantidade.type = 'text';
                inputQuantidade.name = 'quantidade[]';
                inputQuantidade.placeholder = 'Quantidade';
                inputQuantidade.classList.add('form-control');

                const inputValor = document.createElement('input');
                inputValor.type = 'text';
                inputValor.name = 'valor_unitario[]';
                inputValor.placeholder = 'Valor';
                inputValor.classList.add('form-control');

                const botaoRemover = document.createElement('button');
                botaoRemover.type = 'button';
                botaoRemover.textContent = 'Remover';
                botaoRemover.classList.add('btn-remover');
                botaoRemover.addEventListener('click', () => {
                    divPeca.remove();
                });

                divPeca.appendChild(inputPeca);
                divPeca.appendChild(inputQuantidade);
                divPeca.appendChild(inputValor);
                divPeca.appendChild(botaoRemover);

                container.appendChild(divPeca);
            });
        });
    </script>
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
            <h1>Realizar Manutenção</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/manutencao/salvar">
                <div class="form-section">
                    <h2>Descrição</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label for="descricao">Descrição do serviço
                                <input id="descricao" name="descricao" type="text" class="form-control" value="<?= isset($dados_manutencao) ? $dados_manutencao->descricao : "" ?>" />
                            </label>

                            <label>Tipo de Manutencao
                                <select name="tipo" class="form-control">
                                    <option>Selecione</option>
                                    <option value="PR" <?= isset($dados_manutencao) && $dados_manutencao->tipo == 'PR' ? 'selected' : '' ?>>Preventiva</option>
                                    <option value="CO" <?= isset($dados_manutencao) && $dados_manutencao->tipo == 'CO' ? 'selected' : '' ?>>Corretiva</option>
                                    <option value="N" <?= isset($dados_manutencao) && $dados_manutencao->tipo == 'N' ? 'selected' : '' ?>>Preditiva</option>
                                    <option value="S" <?= isset($dados_manutencao) && $dados_manutencao->tipo == 'S' ? 'selected' : '' ?>>Emergência</option>
                                    <option value="N" <?= isset($dados_manutencao) && $dados_manutencao->tipo == 'N' ? 'selected' : '' ?>>Estética</option>
                                    <option value="N" <?= isset($dados_manutencao) && $dados_manutencao->tipo == 'N' ? 'selected' : '' ?>>Periódica</option>
                                    <option value="N" <?= isset($dados_manutencao) && $dados_manutencao->tipo == 'N' ? 'selected' : '' ?>>Modificações</option>
                                    <option value="S" <?= isset($dados_manutencao) && $dados_manutencao->tipo == 'S' ? 'selected' : '' ?>>Elétrica</option>
                                    <option value="N" <?= isset($dados_manutencao) && $dados_manutencao->tipo == 'N' ? 'selected' : '' ?>>Outra</option>
                                </select>
                            </label>

                            <label for="dt_manutencao"> Data da manutenção
                                <input id="dt_manutencao" name="dt_manutencao" value="<?= isset($dados_manutencao) && isset($dados_manutencao->dt_manutencao) ? $dados_manutencao->dt_manutencao : date('Y-m-d') ?>" type="date" required/>
                            </label>

                            <label for="quilometragem">Quilometragem atual
                                <input id="quilometragem" name="quilometragem" type="text" class="form-control" value="<?= isset($dados_manutencao) ? $dados_manutencao->quilometragem : "" ?>" />
                            </label>

                        </div>
                        <div class="form-column">
                            <label for="id_veiculo">Veiculo
                                <select id="id_veiculo" name="id_veiculo" class="form-control">
                                    <option>Selecione</option>
                                    <?php for ($i = 0; $i < $total_veic; $i++): 
                                        $selecionado = "";
                                        if (isset($dados_manutencao->id)) 
                                            $selecionado = ($lista_veic[$i]->id == $dados_manutencao->id_veiculo) ? "selected" : "";
                                    ?>
                                        <option value="<?= $lista_veic[$i]->id ?>" <?= $selecionado ?>>
                                            <?= $lista_veic[$i]->marca ?>
                                        </option>
                                    <?php endfor ?>
                                </select>
                            </label>

                            <label for="valor"> Valor Mão de Obra | Serviço
                                <input id="valor" name="valor" 
                                    value="<?= isset($dados_manutencao) && isset($dados_manutencao->valor) ? number_format($dados_manutencao->valor, 2, ',', '') : "0,00" ?>" 
                                    type="text" required 
                                    oninput="formatarValor(this)" />
                            </label>

                            <label for="valor_total"> Valor total
                                <input id="valor_total" name="valor_total" 
                                    value="<?= isset($dados_manutencao) && isset($dados_manutencao->valor_total) ? number_format($dados_manutencao->valor_total, 2, ',', '') : "0,00" ?>" 
                                    type="text" required 
                                    oninput="formatarValor(this)" readonly/>
                            </label>

                                        <label for="id_funcionario">Funcionário
                                            <select id="id_funcionario" name="id_funcionario" class="form-control">
                                                <option>Selecione</option>
                                                <?php for ($i = 0; $i < $total_func; $i++): 
                                                    $selecionado = "";
                                                    if (isset($dados_manutencao->id)) 
                                                        $selecionado = ($lista_func[$i]->id == $dados_manutencao->id_funcionario) ? "selected" : "";
                                                ?>
                                                    <option value="<?= $lista_func[$i]->id ?>" <?= $selecionado ?>>
                                                        <?= $lista_func[$i]->nome_completo ?>
                                                    </option>
                                                <?php endfor ?>
                                            </select>
                                        </label>
                        </div>
                    </div>
                </div>
                
                </br>
                <section class="peca">
                    <h2>Peças</h2>
                    <br>
                    <div id="peca-container">
                    </div>
                    <button type="button" id="adicionar-peca">Adicionar Peça</button>
                </section>

                <br>

                <?php if (isset($dados_manutencao)): ?>
                    <input type="hidden" name="id" value="<?= $dados_manutencao->id ?>">
                <?php endif; ?>

                <div class="form-buttons">
                <?php if (!isset($dados_manutencao)): ?>

                    <button type="submit">
                        <?= isset($dados_manutencao) ? 'Alterar' : 'Cadastrar' ?>
                    </button>
                    <?php endif; ?>


                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/manutencao'">Consultar</button>

                    <?php if (isset($dados_manutencao)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/manutencao/excluir?id=<?= $dados_manutencao->id ?>'">
                            Excluir
                        </button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</body>
</html>