document.addEventListener('DOMContentLoaded', function () {
    // Referência ao formulário e ao campo
    const form = document.getElementById('formVetor');
    const campoVetor = document.getElementById('campoVetor');
    const erroVetor = document.getElementById('erro-vetor');

    // Adiciona um listener para a submissão do formulário
    form.addEventListener('submit', function (event) {
        // Captura o botão que foi clicado (útil para o JS saber o que validar)
        const submitter = event.submitter;

        // A validação de preenchimento só é necessária para o botão 'gerar'
        if (submitter && submitter.name === 'gerar') {
            // Remove espaços em branco do início e fim
            const valor = campoVetor.value.trim();

            if (valor === '') {
                // Previne a submissão do formulário
                event.preventDefault();
                
                // Exibe a mensagem de erro
                erroVetor.textContent = "O campo é obrigatório.";
                campoVetor.focus(); // Coloca o foco no campo para o usuário
                
            } else {
                // Limpa a mensagem de erro se estiver tudo OK para submeter
                erroVetor.textContent = '';
                // O formulário prossegue com a submissão para o PHP
            }
        }
        // Para os botões 'ordenar' e 'limpar', a submissão prossegue normalmente
    });

    // Limpa a mensagem de erro ao digitar
    campoVetor.addEventListener('input', function() {
        if (campoVetor.value.trim() !== '') {
            erroVetor.textContent = '';
        }
    });
});