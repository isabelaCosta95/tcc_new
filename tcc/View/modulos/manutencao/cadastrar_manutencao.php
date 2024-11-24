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
                // Cria uma nova div para os campos
                const divPeca = document.createElement('div');
                divPeca.classList.add('peca-row'); // Adicione uma classe para estilização, se necessário
                
                // Campo para a peça
                const inputPeca = document.createElement('input');
                inputPeca.type = 'text';
                inputPeca.name = 'peca[]';
                inputPeca.placeholder = 'Peça';
                inputPeca.classList.add('form-control');

                // Campo para a quantidade
                const inputQuantidade = document.createElement('input');
                inputQuantidade.type = 'text';
                inputQuantidade.name = 'quantidade[]';
                inputQuantidade.placeholder = 'Quantidade';
                inputQuantidade.classList.add('form-control');

                // Campo para o valor unitário
                const inputValor = document.createElement('input');
                inputValor.type = 'text';
                inputValor.name = 'valor_unitario[]';
                inputValor.placeholder = 'Valor Unitário';
                inputValor.classList.add('form-control');

                // Campo para o valor unitário
                const inputValorT = document.createElement('input');
                inputValorT.type = 'text';
                inputValorT.name = 'valor_total[]';
                inputValorT.placeholder = 'Valor Total';
                inputValorT.classList.add('form-control');

                // Botão de remover
                const botaoRemover = document.createElement('button');
                botaoRemover.type = 'button';
                botaoRemover.textContent = 'Remover';
                botaoRemover.classList.add('btn-remover');
                botaoRemover.addEventListener('click', () => {
                    divPeca.remove(); // Remove o bloco de campos
                });

                // Adiciona os campos e o botão à div
                divPeca.appendChild(inputPeca);
                divPeca.appendChild(inputQuantidade);
                divPeca.appendChild(inputValor);
                divPeca.appendChild(inputValorT);
                divPeca.appendChild(botaoRemover);

                // Adiciona a div ao contêiner
                container.appendChild(divPeca);

                // Aplica a classe last-row na última linha
                    const todasAsLinhas = container.querySelectorAll('.peca-row');
                    if (todasAsLinhas.length > 0) {
                        const ultimaLinha = todasAsLinhas[todasAsLinhas.length - 1];
                        ultimaLinha.classList.add('last-row');
                    }
            });
        });

        function atualizarCamposResponsavel() {
        const responsavel = document.getElementById('responsavel').value;
        const campoFuncionario = document.getElementById('campo-funcionario');
        const campoMecanico = document.getElementById('campo-mecanico');

        if (responsavel === 'F') {
            campoFuncionario.style.display = 'block';
            campoMecanico.style.display = 'none';
        } else if (responsavel === 'M') {
            campoFuncionario.style.display = 'none';
            campoMecanico.style.display = 'block';
        } else {
            campoFuncionario.style.display = 'none';
            campoMecanico.style.display = 'none';
        }
    }

    // Atualiza os campos na inicialização, caso haja valor selecionado no servidor
    document.addEventListener('DOMContentLoaded', () => {
        atualizarCamposResponsavel();
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
            <h1>Cadastrar Manutenção</h1>
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
                                <select name="ativo" class="form-control">
                                    <option>Selecione</option>
                                    <option value="PR" <?= isset($dados_manutencao) && $dados_manutencao->ativo == 'PR' ? 'selected' : '' ?>>Preventiva</option>
                                    <option value="CO" <?= isset($dados_manutencao) && $dados_manutencao->ativo == 'CO' ? 'selected' : '' ?>>Corretiva</option>
                                    <option value="N" <?= isset($dados_manutencao) && $dados_manutencao->ativo == 'N' ? 'selected' : '' ?>>Preditiva</option>
                                    <option value="S" <?= isset($dados_manutencao) && $dados_manutencao->ativo == 'S' ? 'selected' : '' ?>>Emergência</option>
                                    <option value="N" <?= isset($dados_manutencao) && $dados_manutencao->ativo == 'N' ? 'selected' : '' ?>>Estética</option>
                                    <option value="N" <?= isset($dados_manutencao) && $dados_manutencao->ativo == 'N' ? 'selected' : '' ?>>Periódica</option>
                                    <option value="N" <?= isset($dados_manutencao) && $dados_manutencao->ativo == 'N' ? 'selected' : '' ?>>Modificações</option>
                                    <option value="S" <?= isset($dados_manutencao) && $dados_manutencao->ativo == 'S' ? 'selected' : '' ?>>Elétrica</option>
                                    <option value="N" <?= isset($dados_manutencao) && $dados_manutencao->ativo == 'N' ? 'selected' : '' ?>>Outra</option>
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
                            <label for="veiculo ">Veiculo
                                <select id="veiculo" name="veiculo" class="form-control">
                                    <option>Selecione</option>
                                    <?php for ($i = 0; $i < $total_veic; $i++): 
                                        $selecionado = "";
                                        if (isset($dados_manutencao->id)) 
                                            $selecionado = ($lista_veic[$i]->id == $dados_manutencao->veiculo) ? "selected" : "";
                                    ?>
                                        <option value="<?= $lista_veic[$i]->id ?>" <?= $selecionado ?>>
                                            <?= $lista_veic[$i]->descricao ?>
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

                            <label for="valor"> Valor total
                                <input id="valor" name="valor" 
                                    value="<?= isset($dados_manutencao) && isset($dados_manutencao->valor) ? number_format($dados_manutencao->valor, 2, ',', '') : "0,00" ?>" 
                                    type="text" required 
                                    oninput="formatarValor(this)" readonly/>
                            </label>

                            <div class="form-row">
                                <div class="form-column">
                                    <label>Responsável
                                        <select id="responsavel" name="responsavel" class="form-control" onchange="atualizarCamposResponsavel()">
                                            <option value="F" <?= isset($dados_manutencao) && $dados_manutencao->responsavel == 'F' ? 'selected' : '' ?>>Funcionário</option>
                                            <option value="M" <?= isset($dados_manutencao) && $dados_manutencao->responsavel == 'M' ? 'selected' : '' ?>>Mecânico</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="form-column">
                                    <div id="campo-funcionario" style="display: none;" class="campo-responsavel">
                                        <label for="funcionario">Funcionário
                                            <select id="funcionario" name="funcionario" class="form-control">
                                                <option>Selecione</option>
                                                <?php for ($i = 0; $i < $total_func; $i++): 
                                                    $selecionado = "";
                                                    if (isset($dados_manutencao->id)) 
                                                        $selecionado = ($lista_func[$i]->id == $dados_manutencao->funcionario) ? "selected" : "";
                                                ?>
                                                    <option value="<?= $lista_func[$i]->id ?>" <?= $selecionado ?>>
                                                        <?= $lista_func[$i]->descricao ?>
                                                    </option>
                                                <?php endfor ?>
                                            </select>
                                        </label>
                                    </div>

                                    <div id="campo-mecanico" style="display: none;" class="campo-responsavel">
                                        <label for="mecanico">Mecânico
                                            <input id="mecanico" name="mecanico" type="text" class="form-control" 
                                                value="<?= isset($dados_manutencao) ? $dados_manutencao->mecanico : "" ?>" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="form-buttons">
                    <button type="submit">Cadastrar</button>
                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/manutencao'">Consultar</button>
                    <?php if (isset($dados_manutencao)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/manutencao/excluir?id=<?= $dados_manutencao->id ?>'">
                            Excluir
                        </button>
                    <?php endif ?>
                </div>

                </br>
                <section class="peca">
                    <h2>Peças</h2>
                    <br>
                    <div id="peca-container">
                    </div>
                    <button type="button" id="adicionar-peca">Adicionar Peça</button>
                </section>
            </form>
        </div>
    </div>
</body>
</html>