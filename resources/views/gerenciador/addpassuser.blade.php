@extends('layouts.login')

@section('title', 'login')

@section('content') 
    <h1 class="ola-user">Ola {{$username}}, cadastre suas senhas<br>abaixo</h1>

    <div class="add-pass-user-local-e-senha-box">
    <form id="Cadastro" method="POST" action="{{ route('add_pass_store', ['page_id' => $page_id]) }}">
    @csrf
        <input type="text" name="local" placeholder="Local" class="add-pass-user-local" required>
        <br>
        <input type="password" name="senha" placeholder="Senha" class="add-pass-user-senha">

        <br>

        <input type="submit" name="action" class="rnd-pass" value="Senha Gerada">
        <br>

        <input type="submit" name="action" value="Cadastro" class="botao-cadastro-senha">
    
    </form>
    <a href="/User/{{$page_id}}" class="botao-voltar-addsenha">Voltar</a>
    </div>
@endsection

