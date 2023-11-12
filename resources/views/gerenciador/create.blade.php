@extends('layouts.login')

@section('title', 'login')

@section('content')
    
<div class="cadastro-container">
    <div class="titulo1">
        <h1>Key Guardian</h1>
    </div>

    <p id="error-message" class="error-message"></p>

    <form id="Cadastro" method="POST" action="{{ route('cadastro-store') }}">
        @csrf
        <input type="text" name="usuario" placeholder="Usuario" class="input-user-email-senha" required>
        <input type="email" name="email" placeholder="Email" class="input-user-email-senha" required>
        
        <input type="password" name="senha" placeholder="Senha" id="senha" class="input-user-email-senha" required>
        <button type="button" id="mostrarSenha" onclick="mostrarOcultarSenha()" class="show-pass-cadastro">
            <img src="/img/show.png" class="show-pass-img" id="showPassImg">
        </button>

        <input type="password" name="confirm-senha" id="confirm_senha" placeholder="Confirmar Senha" class="input-user-email-senha" required>
        <button type="button" id="mostrarSenha-confirm" onclick="mostrarOcultarSenhaConfirm()" class="show-pass-cadastro">
            <img src="/img/show.png" class="show-pass-img" id="showPassImg-confirm">
        </button>

        <input type="submit" value="Cadastro" class="botao-cadastro" onclick="return validateForm()">
    </form>

    <a href="/" class="botao-voltar">Voltar</a>

    

    <script>

    function validateForm() {
        var password = document.getElementById('senha').value;
        var confirmPassword = document.getElementById('confirm_senha').value;
        var errorMessage = document.getElementById('error-message');

        if (password.length < 8) {
            errorMessage.innerHTML = "A senha deve ter pelo menos 8 caracteres.";
            return false;
        }

        // Verifica se a senha contém pelo menos um caractere especial
        var specialCharacter = /[!@#\$%^&*\(\),.?":{}|<>]/;
        if (!specialCharacter.test(password)) {
            errorMessage.innerHTML = "A senha deve conter pelo menos um caractere especial.";
            return false;
        }

        // Verifica se a senha e a confirmação de senha são iguais
        if (password !== confirmPassword) {
            errorMessage.innerHTML = "As senhas não coincidem.";
            return false;
        }

        // Se a senha atender aos requisitos, limpa a mensagem de erro e permite o envio do formulário
        errorMessage.innerHTML = "";
        return true;
    }

        function mostrarOcultarSenha() {
            var senhaInput = document.getElementById('senha');
            var showPassImg = document.getElementById('showPassImg');

            // Alterna entre o tipo de input password e text
            senhaInput.type = (senhaInput.type === 'password') ? 'text' : 'password';

            // Alterna entre as imagens show.png e hide.png
            showPassImg.src = (senhaInput.type === 'password') ? '/img/show.png' : '/img/hide.png';
        }

        function mostrarOcultarSenhaConfirm() {
            var senhaInputConfirm = document.getElementById('confirm_senha');
            var showPassImgConfirm = document.getElementById('showPassImg-confirm');

            // Alterna entre o tipo de input password e text
            senhaInputConfirm.type = (senhaInputConfirm.type === 'password') ? 'text' : 'password';

            // Alterna entre as imagens show.png e hide.png
            showPassImgConfirm.src = (senhaInputConfirm.type === 'password') ? '/img/show.png' : '/img/hide.png';
        }
    </script>
</div>

@endsection