function formatarInscricaoEstadual(input) {
    let valor = input.value.replace(/\D/g, '');
    
    //formatação (XXX.XXX.XXX.XXX)
    if (valor.length <= 3) {
        input.value = valor;
    } else if (valor.length <= 6) {
        input.value = valor.replace(/(\d{3})(\d{1,3})/, '$1.$2');
    } else if (valor.length <= 9) {
        input.value = valor.replace(/(\d{3})(\d{3})(\d{1,3})/, '$1.$2.$3');
    } else {
        input.value = valor.replace(/(\d{3})(\d{3})(\d{3})(\d{1,3})/, '$1.$2.$3.$4');
    }
}

// Função para formatar CPF ou CNPJ conforme o usuário digita
function formatarCNPJCPF(input) {
    let valor = input.value.replace(/\D/g, ''); // Remove qualquer caractere não numérico

    // Formata como CPF se tiver até 11 dígitos
    if (valor.length <= 11) {
        if (valor.length <= 3) {
            input.value = valor;
        } else if (valor.length <= 6) {
            input.value = valor.replace(/(\d{3})(\d{1,3})/, '$1.$2');
        } else if (valor.length <= 9) {
            input.value = valor.replace(/(\d{3})(\d{3})(\d{1,3})/, '$1.$2.$3');
        } else {
            input.value = valor.replace(/(\d{3})(\d{3})(\d{3})(\d{1,2})/, '$1.$2.$3-$4');
        }
    } 
    // Formata como CNPJ se tiver mais de 11 dígitos
    else if (valor.length <= 14) {
        if (valor.length <= 2) {
            input.value = valor;
        } else if (valor.length <= 5) {
            input.value = valor.replace(/(\d{2})(\d{1,3})/, '$1.$2');
        } else if (valor.length <= 8) {
            input.value = valor.replace(/(\d{2})(\d{3})(\d{1,3})/, '$1.$2.$3');
        } else if (valor.length <= 12) {
            input.value = valor.replace(/(\d{2})(\d{3})(\d{3})(\d{1,4})/, '$1.$2.$3/$4');
        } else {
            input.value = valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
        }
    }
}

document.querySelector('form').addEventListener('submit', function(event) {
    const emailInput = document.getElementById('email');
    const emailValue = emailInput.value;

    if (!validarEmail(emailValue)) {
        alert('Digite um email válido!');
        event.preventDefault(); 
    }
});

function validarEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

function formatarTelefone(input) {
    let valor = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos

    // Adiciona a formatação ao número
    if (valor.length <= 10) {
        // Formato com DDD e número de 8 dígitos: (XX) XXXX-XXXX
        input.value = valor.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
    } else {
        // Formato com DDD e número de 9 dígitos: (XX) XXXXX-XXXX
        input.value = valor.replace(/(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
    }
}

function formatarValor(campo) {
    // Remove caracteres não numéricos
    let valor = campo.value.replace(/\D/g, '');

    // Adiciona as casas decimais
    if (valor.length > 2) {
        valor = valor.slice(0, -2) + ',' + valor.slice(-2);
    } else if (valor.length === 2) {
        valor = '0,' + valor;
    } else if (valor.length === 1) {
        valor = '0,0' + valor;
    } else {
        valor = '0,00';
    }

    // Atualiza o valor do campo
    campo.value = valor;
}

document.getElementById('adicionar-parada').addEventListener('click', function() {
    // Criar o contêiner da parada
    const parada = document.createElement('div');
    parada.classList.add('parada');

    // Adicionar os campos de parada
    parada.innerHTML = `
        <div class="form-row">
            <label for="local[]">Local
                <input name="local[]" type="text" placeholder="Digite o local" />
            </label>
            <label for="valor[]">Valor
                <input name="valor[]" type="text" placeholder="Digite o valor" />
            </label>
        </div>
    `;

    // Inserir no contêiner de paradas
    document.getElementById('paradas-container').appendChild(parada);
});