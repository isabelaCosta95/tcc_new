<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tcc/View/includes/css/style.css">
    <title>Cadastrar Viagem</title>
    <style>
        .parada-row {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
            align-items: center;
        }

        .parada-row input {
            flex: 1;
        }

        .parada-row .btn-remover {
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

                            <label for="id_veiculo ">Veiculo
                                <select id="id_veiculo" name="id_veiculo" class="form-control" required>
                                    <option>Selecione</option>
                                    <?php for ($i = 0; $i < $total_veiculo; $i++):
                                        $selecionado = "";
                                        if (isset($dados_viagem->id))
                                            $selecionado = ($lista_veiculo[$i]->id == $dados_car->id_veiculo) ? "selected" : "";
                                    ?>
                                        <option value="<?= $lista_veiculo[$i]->id ?>" <?= $selecionado ?>>
                                            <?= $lista_veiculo[$i]->nome_proprietario ?>
                                        </option>
                                    <?php endfor ?>
                                </select>
                            </label>

                            <label for="id_funcionario ">Funcionário
                                <select id="id_funcionario" name="id_funcionario" class="form-control" required>
                                    <option>Selecione</option>
                                    <?php for ($i = 0; $i < $total_func; $i++):
                                        $selecionado = "";
                                        if (isset($dados_viagem->id))
                                            $selecionado = ($lista_func[$i]->id == $dados_car->id_funcionario) ? "selected" : "";
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
                                <label for="id_carga">Carga
                                    <select id="id_carga" name="id_carga" class="form-control" required>
                                        <option>Selecione</option>
                                        <?php
                                        for ($i = 0; $i < $total_car; $i++):
                                            $selecionado = "";

                                            // Verifica se o ID está na URL
                                            if (isset($_GET['id_carga'])) {
                                                $selecionado = ($lista_car[$i]->id == $_GET['id_carga']) ? "selected" : "";
                                            } elseif (isset($dados_viagem->id)) {
                                                $selecionado = ($lista_car[$i]->id == $dados_car->id_carga) ? "selected" : "";
                                            }
                                        ?>
                                            <option value="<?= $lista_car[$i]->id ?>" <?= $selecionado ?>>
                                                <?= $lista_car[$i]->descricao ?>
                                            </option>
                                        <?php endfor; ?>
                                    </select>
                                </label>

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