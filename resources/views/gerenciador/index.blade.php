@extends('layouts.login')

@section('title', 'login')

@section('content')

<div class="login-container">

    <div class="titulo1"><h1>Key Guardian</h1></div>

    <form id="login" method="POST" action="{{ route('login-store') }}">
    @csrf

        <input type="email" id="email" name="email" placeholder="Email" class="input-user-email-senha" required>
        <input type="password" id="senha" name="senha" placeholder="Senha" class="input-user-email-senha" required>
        <button type="button" id="mostrarSenha" onclick="mostrarOcultarSenha()" class="show-pass-login">
            <img src="/img/show.png" class="show-pass-img" id="showPassImg">
        </button>


        <button id="submit" class="botao-login" value="true">Entrar</button>
        <div class="mini-texto1"><a href="/esqueci-a-senha">Esqueceu a senha? &nbsp;</a></div>
        <div class="mini-texto2"><a href="/cadastro">Criar conta</a></div>

    </form>

    <script>
            function mostrarOcultarSenha() {
                var senhaInput = document.getElementById('senha');
                var showPassImg = document.getElementById('showPassImg');

                // Alterna entre o tipo de input password e text
                senhaInput.type = (senhaInput.type === 'password') ? 'text' : 'password';

                // Alterna entre as imagens show.png e hide.png
                showPassImg.src = (senhaInput.type === 'password') ? '/img/show.png' : '/img/hide.png';
            }
    </script>

</div>

@endsection