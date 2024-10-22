// Função para exibir uma mensagem de alerta personalizada
function showAlert(message, type = 'success') {
    const alertPlaceholder = document.createElement('div');
    alertPlaceholder.classList.add('alert', `alert-${type}`, 'alert-dismissible', 'fade', 'show');
    alertPlaceholder.setAttribute('role', 'alert');
    alertPlaceholder.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    // Adiciona o alerta no topo do body
    document.body.prepend(alertPlaceholder);
    // Remove o alerta após 5 segundos
    setTimeout(() => {
        alertPlaceholder.classList.remove('show');
        alertPlaceholder.classList.add('hide');
        setTimeout(() => alertPlaceholder.remove(), 500);
    }, 5000);
}
// Exemplo de evento que dispara a mensagem de alerta
document.addEventListener('DOMContentLoaded', () => {
    const testButton = document.getElementById('test-alert');
    if (testButton) {
        testButton.addEventListener('click', () => {
            showAlert('Este é um alerta de exemplo!', 'info');
        });
    }
});
// Função para confirmar antes de excluir um item
function confirmDeletion(message = 'Tem certeza que deseja excluir este item?') {
    return confirm(message);
}
// Exemplo de manipulação de formatação de inputs
document.addEventListener('DOMContentLoaded', () => {
    const inputs = document.querySelectorAll('input[type="text"]');
    inputs.forEach(input => {
        input.addEventListener('input', () => {
            // Converte o valor para maiúsculas
            input.value = input.value.toUpperCase();
        });
    });
});