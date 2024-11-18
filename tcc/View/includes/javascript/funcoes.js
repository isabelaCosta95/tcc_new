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

function formatarValor(input) {
    let valor = input.value.replace(/\D/g, ''); // Remove tudo que não for número

    // Verifica se o valor tem mais de 2 dígitos após o ponto para formatar como moeda
    if (valor.length > 2) {
        valor = valor.replace(/(\d{2})$/, ',$1'); // Adiciona a vírgula antes dos centavos
    }

    // Formata o número com separador de milhar
    valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

    // Adiciona o prefixo de moeda
    input.value = valor ? 'R$ ' + valor : '';
}
