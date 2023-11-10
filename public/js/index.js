document.addEventListener('DOMContentLoaded', function() {
    var botoesVisualizar = document.querySelectorAll('.btn-visualizar');

    botoesVisualizar.forEach(function(botao) {
        botao.addEventListener('click', function() {
            var senhaElemento = botao.parentElement;
            var senhaTexto = senhaElemento.querySelector('.senha-text');

            if (senhaTexto.style.display === 'none') {
                senhaTexto.style.display = 'inline';
                botao.querySelector('span').textContent = 'Ocultar Senha';
            } else {
                senhaTexto.style.display = 'none';
                botao.querySelector('span').textContent = 'SENHA!';
            }
        });
    });
});