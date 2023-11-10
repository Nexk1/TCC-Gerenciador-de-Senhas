@extends('layouts.login')

@section('title', 'login')

@section('content')
    
    <div class="cadastro-container">

    <div class="titulo1"><h1>Key Guardian</h1></div>     

    <form id="Cadastro" method="POST" action="{{ route('cadastro-store') }}">
    @csrf
        <input type="text" name="usuario" placeholder="Usuario" class="input-user-email-senha" required>

        <input type="email" name="email" placeholder="Email" class="input-user-email-senha" required>

        <input type="password" name="senha" placeholder="Senha" class="input-user-email-senha" required>

        <input type="password" name="confirm-senha" placeholder="Confirmar Senha" class="input-user-email-senha" required>

        <input type="submit" value="Cadastro" class="botao-cadastro">
    
    </form>
    <a href="/" class="botao-voltar">Voltar</a>
    </div>
@endsection