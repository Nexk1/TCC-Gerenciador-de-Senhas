@extends('layouts.login')

@section('title', 'Esqueceu')

@section('content') 
<div class="quadrado">
    <p>Insira a nova senha abaixo.</p>
    <div class="formulario-codigo">
        <form id="RecSenha" action="{{ route('nova_senha_store', ['valor_aleatorio' => $valor_aleatorio, 'email' => $email]) }}" method="POST" onsubmit="return validateForm()">
            @csrf
            <div class="input-email-esqueceu">
                <input type="password" name="Att-senha" id="Att-senha" placeholder="Senha" class="inserir-codigo" required>
                <button type="button" onclick="mostrarOcultarSenha('Att-senha', 'showPassImg')" class="show-pass-cadastro">
                    <img src="/img/show.png" class="show-pass-img" id="showPassImg">
                </button>
            </div>
            <br>
            <br>
            <div class="input-email-esqueceu">
                <input type="password" name="Att-senha-confirm" id="Att-senha-confirm" placeholder="Confirmar Senha" class="inserir-codigo" required>
                <button type="button" onclick="mostrarOcultarSenha('Att-senha-confirm', 'showPassImg-confirm')" class="show-pass-cadastro">
                    <img src="/img/show.png" class="show-pass-img" id="showPassImg-confirm">
                </button>
            </div>
            <div class="esq-email-txt">
                <button type="submit" class="botao-recsenha" value="true">Nova Senha</button>
            </div>
        </form>     
        <a href="/"><button type="button" class="botao-recsenha-voltar">Voltar</button></a>
    </div>
</div>

<p id="error-message" class="error-message-rec"></p>

<script>
    function validateForm() {
        var password = document.getElementById('Att-senha').value;
        var confirmPassword = document.getElementById('Att-senha-confirm').value;
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

    function mostrarOcultarSenha(id, imgId) {
        var senhaInput = document.getElementById(id);
        var showPassImg = document.getElementById(imgId);

        // Alterna entre o tipo de input password e text
        senhaInput.type = (senhaInput.type === 'password') ? 'text' : 'password';

        // Alterna entre as imagens show.png e hide.png
        showPassImg.src = (senhaInput.type === 'password') ? '/img/show.png' : '/img/hide.png';
    }
</script>

@endsection