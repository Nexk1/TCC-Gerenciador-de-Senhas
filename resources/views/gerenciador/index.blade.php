@extends('layouts.login')

@section('title', 'login')

@section('content')

<div class="login-container">

<div class="titulo1"><h1>Key Guardian</h1></div>

<form id="login" method="POST" action="{{ route('login-store') }}">
@csrf

    <input type="email" id="email" name="email" placeholder="Email" class="input-user-email-senha" required>
    <input type="password" id="senha" name="senha" placeholder="Senha" class="input-user-email-senha" required>

    <button id="submit" class="botao-login" value="true">Entrar</button>
    <div class="mini-texto1"><a href="/esqueci-a-senha">Esqueceu a senha? &nbsp;</a></div>
    <div class="mini-texto2"><a href="/cadastro">Criar conta</a></div>

</form>
</div>

@endsection