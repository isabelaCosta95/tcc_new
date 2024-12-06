<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Cadastrar Viagem</title>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const botaoAdicionar = document.getElementById('adicionar-parada');
            const container = document.getElementById('parada-container');

            botaoAdicionar.addEventListener('click', () => {
                const divParada = document.createElement('div');
                divParada.classList.add('parada-row');

                const inputParada = document.createElement('input');
                inputParada.type = 'text';
                inputParada.name = 'parada[]';
                inputParada.placeholder = 'Parada';
                inputParada.classList.add('form-control');

                const inputLocal = document.createElement('input');
                inputLocal.type = 'text';
                inputLocal.name = 'local[]';
                inputLocal.placeholder = 'Local';
                inputLocal.classList.add('form-control');

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
                    divParada.remove();
                });

                divParada.appendChild(inputParada);
                divParada.appendChild(inputLocal);
                divParada.appendChild(inputValor);
                divParada.appendChild(botaoRemover);

                container.appendChild(divParada);
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
            <h1>Gerenciar Viagem</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/viagem/salvar">
                <div class="form-section">
                    <h2>Partida</h2>
                    <div class="form-row">
                        <div class="form-column">

                            <label for="data_inicio"> Data Inicio
                                <input id="data_inicio" name="data_inicio" value="<?= isset($dados_viagem) && isset($dados_viagem->data_inicio) ? $dados_viagem->data_inicio : date('Y-m-d') ?>" type="date" required />
                            </label>

                            <label>Endereço Partida
                                <input name="endereco_partida" value="<?= isset($dados_viagem) && isset($dados_viagem->endereco_partida) ? $dados_viagem->endereco_partida : "" ?>" type="text" />
                            </label>

                        </div>
                        <div class="form-column">

                            <label for="id_veiculo">Veiculo
                                <select id="id_veiculo" name="id_veiculo" class="form-control">
                                    <option>Selecione</option>
                                    <?php for ($i = 0; $i < $total_veiculo; $i++): ?>
                                        <?php
                                        $selecionado = (isset($dados_viagem->id_veiculo) && $lista_veiculo[$i]->id == $dados_viagem->id_veiculo) ? "selected" : "";
                                        ?>
                                        <option value="<?= $lista_veiculo[$i]->id ?>" <?= $selecionado ?>>
                                            <?= $lista_veiculo[$i]->nome_proprietario ?>
                                        </option>
                                    <?php endfor; ?>

                                </select>
                            </label>

                            <label for="id_funcionario">Funcionário
                                <select id="id_funcionario" name="id_funcionario" class="form-control">
                                    <option>Selecione</option>
                                    <?php for ($i = 0; $i < $total_func; $i++): ?>
                                        <?php
                                        $selecionado = (isset($dados_viagem->id_funcionario) && $lista_func[$i]->id == $dados_viagem->id_funcionario) ? "selected" : "";
                                        ?>
                                        <option value="<?= $lista_func[$i]->id ?>" <?= $selecionado ?>>
                                            <?= $lista_func[$i]->nome_completo ?>
                                        </option>
                                    <?php endfor; ?>

                                </select>
                            </label>

                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Chegada</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label for="data_fim"> Data Fim
                                <input id="data_fim" name="data_fim" value="<?= isset($dados_viagem) && isset($dados_viagem->data_fim) ? $dados_viagem->data_fim : date('Y-m-d') ?>" type="date" />
                            </label>
                            <label>Observação
                                <input name="observacao" value="<?= isset($dados_viagem) && isset($dados_viagem->observacao) ? $dados_viagem->observacao : "" ?>" type="text" />
                            </label>
                        </div>
                        <div class="form-column">
                            <label>Endereço chegada
                                <input name="endereco_chegada" value="<?= isset($dados_viagem) && isset($dados_viagem->endereco_chegada) ? $dados_viagem->endereco_chegada : "" ?>" type="text" />
                            </label>

                            <div style="display: flex; align-items: center; gap: 10px;">
    <div style="display: flex; flex-direction: column; width: 100%;">
        <label for="id_carga" style="margin-bottom: 5px;">Carga</label>
        <select id="id_carga" name="id_carga" class="form-control" required style="width: 100%; padding: 8px; font-size: 16px;">
            <option>Selecione</option>
            <?php for ($i = 0; $i < $total_car; $i++): ?>
                <?php
                // Inicializa a variável de seleção
                $selecionado = "";

                // Verifica se há um ID na URL
                if (isset($_GET['id_carga'])) {
                    $selecionado = ($lista_car[$i]->id == $_GET['id_carga']) ? "selected" : "";
                }
                // Verifica se há um ID associado a $dados_viagem
                elseif (isset($dados_viagem->id_carga)) {
                    $selecionado = ($lista_car[$i]->id == $dados_viagem->id_carga) ? "selected" : "";
                }
                ?>
                <option value="<?= $lista_car[$i]->id ?>" <?= $selecionado ?>>
                    <?= $lista_car[$i]->descricao ?>
                </option>
            <?php endfor; ?>
        </select>
    </div>

    <a href='/tcc/carga/cadastrar' target="_blank">
        <img src="/tcc/View/includes/imagem/adicionar.png" alt="Adicionar" style="width: 35px; height: auto; cursor: pointer;" />
    </a>
</div>

                        </div>
                    </div>
                </div>

                </br>
                <section class="parada">
                    <h2>Parada</h2>
                    <br>
                    <div id="parada-container">
                    </div>
                    <button type="button" id="adicionar-parada">Adicionar Parada</button>
                </section>
                <br>

                <?php if (isset($dados_viagem)): ?>
                    <input type="hidden" name="id" value="<?= $dados_viagem->id ?>">
                <?php endif; ?>

                <div class="form-buttons">
                    <button type="submit">
                        <?= isset($dados_viagem) ? 'Alterar' : 'Cadastrar' ?>
                    </button>

                    <button type="button" class="btn-consultar" onclick="window.location.href='/tcc/viagem'">Consultar</button>

                    <?php if (isset($dados_viagem)): ?>
                        <button type="button" class="btn-excluir" onclick="window.location.href='/tcc/viagem/excluir?id=<?= $dados_viagem->id ?>'">
                            Excluir
                        </button>
                    <?php endif; ?>
                </div>

            </form>
        </div>
    </div>
</body>

</html>