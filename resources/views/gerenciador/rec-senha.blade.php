@extends('layouts.login')

@section('title', 'Esqueceu')

@section('content') 
<div class="quadrado">
        <p>Olá!</p>
        <p>Enviamos um código de verificação para o seu endereço de <br>e-mail registrado no nome de [KeyGuardian].Se você solicitou esse código, utilize-o para fazer a recuperação de senha.</p>
        <div class="formulario-codigo">
            <form id="RecSenha" action="{{ route('recuperar_senha_store', ['valor_aleatorio' => $valor_aleatorio, 'email' => $email]) }}" method="POST">
                @csrf
                <input type="text" id="Cod-Rec" name="rec-senha" placeholder="Código de Recuperação" class="inserir-codigo" required>
                <button type="submit" class="botao-recsenha" value="true" onclick="return validateForm()">Recuperar Senha</button>
                <button type="button" class="botao-reenviar" onclick="alert('O código foi enviado novamente.');">Reenviar Código</button>
            </form>
        </div>           
</div>
@endsection