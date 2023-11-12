@extends('layouts.login')

@section('title', 'Esqueceu')

@section('content') 
<div class="quadrado">
        <p>Insira o email abaixo.</p>
        <div class="formulario-codigo">
            <form id="RecSenha" action="{{ route('recuperar_senha') }}">
                <div class="input-email-esqueceu">
                    <input type="text" id="esq-email" name="esq-email" placeholder="Email" class="inserir-codigo" required>
                </div>
                <div class="esq-email-txt">
                    <button id="submit" class="botao-recsenha" value="true">Enviar código</button>

                </div> 
                </div>
            </form>     
            <a href="/"><button type="submit" class="botao-recsenha-voltar">Voltar</button></a>
        </div>
</div>
@endsection