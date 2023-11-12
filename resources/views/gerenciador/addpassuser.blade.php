@extends('layouts.login')

@section('title', 'login')

@section('content') 
    <h1 class="ola-user">Ola {{$username}}, cadastre suas senhas<br>abaixo</h1>

    <div class="add-pass-user-local-e-senha-box">
    <form id="Cadastro" method="POST" action="{{ route('add_pass_store', ['page_id' => $page_id]) }}">
    @csrf
        <input type="text" name="local" placeholder="Local" class="add-pass-user-local" required>
        <br>
        
        <input type="password" name="senha" id="senha" placeholder="Senha" class="add-pass-user-senha">
        <button type="button" id="mostrarSenha" onclick="mostrarOcultarSenha()" class="show-pass">
            <img src="/img/show.png" class="show-pass-img" id="showPassImg">
        </button>
        <br>

        <input type="submit" name="action" class="rnd-pass" value="Senha Gerada">
        <br>

        <input type="submit" name="action" value="Cadastro" class="botao-cadastro-senha">
    
    </form>
    <a href="/User/{{$page_id}}" class="botao-voltar-addsenha">Voltar</a>

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

