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
                // Cria uma nova div para os campos
                const divParada = document.createElement('div');
                divParada.classList.add('parada-row'); // Adicione uma classe para estilização, se necessário
                
                // Campo para a parada
                const inputParada = document.createElement('input');
                inputParada.type = 'text';
                inputParada.name = 'parada[]';
                inputParada.placeholder = 'Parada';
                inputParada.classList.add('form-control');

                // Campo para a local
                const inputLocal = document.createElement('input');
                inputLocal.type = 'text';
                inputLocal.name = 'local[]';
                inputLocal.placeholder = 'Local';
                inputLocal.classList.add('form-control');

                // Campo para o valor unitário
                const inputValor = document.createElement('input');
                inputValor.type = 'text';
                inputValor.name = 'valor_unitario[]';
                inputValor.placeholder = 'Valor';
                inputValor.classList.add('form-control');

                // Botão de remover
                const botaoRemover = document.createElement('button');
                botaoRemover.type = 'button';
                botaoRemover.textContent = 'Remover';
                botaoRemover.classList.add('btn-remover');
                botaoRemover.addEventListener('click', () => {
                    divParada.remove(); // Remove o bloco de campos
                });

                // Adiciona os campos e o botão à div
                divParada.appendChild(inputParada);
                divParada.appendChild(inputLocal);
                divParada.appendChild(inputValor);
                divParada.appendChild(botaoRemover);

                // Adiciona a div ao contêiner
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
            <h1>Cadastrar Viagem</h1>
        </div>
        <div class="formulario">
            <form method="post" action="/tcc/carga/salvar">
                <div class="form-section">
                    <h2>Partida</h2>
                    <div class="form-row">
                        <div class="form-column">
                       <label for="dt_inicio"> Data Inicio
                                <input id="dt_inicio" name="dt_inicio" value="<?= isset($dados_pagar) && isset($dados_pagar->dt_inicio) ? $dados_pagar->dt_inicio : date('Y-m-d') ?>" type="date"/>
                            </label>

                            <label>Endereço Partida
                                <input name="endereco_partida" value="<?= isset($dados_car) && isset($dados_car->endereco_partida) ? $dados_car->endereco_partida : "" ?>" type="text" />
                            </label>
                        </div>
                        <div class="form-column">
                            <label for="veiculo"> Veiculo
                                <select id="veiculo" name="veiculo" class="form-control">
                                    <option value="">Selecione</option>
                                    <?php foreach ($veiculo as $vei): ?>
                                        <option value="<?= $vei['id'] ?>" 
                                            <?= isset($dados_pagar) && $dados_pagar->veiculo == $vei['id'] ? 'selected' : '' ?>>
                                            <?= $vei['descricao'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </label>

                            <label for="motorista"> Funcionario
                                <select id="motorista" name="motorista" class="form-control">
                                    <option value="">Selecione</option>
                                    <?php foreach ($motorista as $mot): ?>
                                        <option value="<?= $mot['id'] ?>" 
                                            <?= isset($dados_pagar) && $dados_pagar->motorista == $mot['id'] ? 'selected' : '' ?>>
                                            <?= $mot['descricao'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </label>

                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Chegada</h2>
                    <div class="form-row">
                        <div class="form-column">
                            <label for="dt_fim"> Data Fim
                                <input id="dt_fim" name="dt_fim" value="<?= isset($dados_pagar) && isset($dados_pagar->dt_fim) ? $dados_pagar->dt_fim : date('Y-m-d') ?>" type="date"/>
                            </label>
                            <label>Observação
                                <input name="observacao" value="<?= isset($dados_car) && isset($dados_car->observacao) ? $dados_car->observacao : "" ?>" type="text"/>
                            </label>
                        </div>
                        <div class="form-column">
                            <label>Endereço chegada
                                <input name="endereco_chegada" value="<?= isset($dados_car) && isset($dados_car->endereco_chegada) ? $dados_car->endereco_chegada : "" ?>" type="text" />
                            </label>

                            <div style="display: flex; align-items: center; gap: 10px;">
    <label for="carga" style="margin: 0; flex-grow: 1;">
        Carga
        <select id="carga" name="carga" class="form-control" style="width: 100%;">
            <option value="">Selecione</option>
            <?php foreach ($carga as $vei): ?>
                <option value="<?= $vei['id'] ?>" 
                    <?= isset($dados_pagar) && $dados_pagar->carga == $vei['id'] ? 'selected' : '' ?>>
                    <?= $vei['descricao'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
    <img src="/tcc/View/includes/imagem/adicionar.png" alt="Adicionar" style="width: 35px; height: auto; cursor: pointer;" />
</div>


                        </div>
                    </div>
                </div>

                </br>
                <section class="parada">
                    <h2>Parada</h2>
                    <br>
                    <div id="parada-container">
                        <!-- Campos adicionados dinamicamente aparecerão aqui -->
                    </div>
                    <button type="button" id="adicionar-parada">Adicionar Parada</button>
                </section>

            </form>
        </div>
    </div>
</body>
</html>