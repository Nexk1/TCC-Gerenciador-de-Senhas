@extends('layouts.login')

@section('title', 'Esqueceu')

@section('content') 
    <div class="quadrado">
        <p>Olá!</p><br><br><br>
        <p>Enviamos um código de verificação para o seu endereço de e-mail registrado no nome de [KeyGuardian].</p>
        <p>Se você solicitou esse código, utilize-o para fazer a recuperação de senha. No entanto, se você não solicitou este código ou não reconhece essa atividade, recomendamos alterar sua senha.</p><br><br><br><br>
        <form id="RecSenha">
            <input type="text" id="Cod-Rec" name="Código de Recuperação" placeholder="Código de Recuperação" class="inserir-codigo" required>
            <button id="submit" class="botao-recsenha" value="true">Recuperar Senha</button>
            <button id="alert-button" class="botao-reenviar" onclick="alert('O código foi enviado novamente.');">Reenviar Código
                
    </div>
@endsection