@extends('layouts.login')

@section('title', 'login')

@section('content') 
<div class="fundo-inicio">   
    <div class="quadrado1">
        <div class="titulo-qd1"><b>Gerenciador de Senhas</b></div>

        <div class="txt1">COFRE</div>

        <p>Senhas</p>
        <div class="icon-senhas"></div>

        <p>Informações pessoais</p>
        <div class="icon-ip"></div>
        
        <p>Notas seguras</p>
        <div class="icon-notas"></div>

        <p>Painel de Identidade</p>
        <div class="icon-pi"></div>

    </div>
    <div class="quadrado2"></div>
    <div class="quadrado3"></div>
    <div class="quadrado4"></div>
</div>

<div class="pesquisa">
    <div class="pesquisar">Pesquisar...</div>
    <div class="icon-pesquisa"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0,0,256,256">
        <g fill="#494949" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8,8)"><path d="M19,3c-5.51172,0 -10,4.48828 -10,10c0,2.39453 0.83984,4.58984 2.25,6.3125l-7.96875,7.96875l1.4375,1.4375l7.96875,-7.96875c1.72266,1.41016 3.91797,2.25 6.3125,2.25c5.51172,0 10,-4.48828 10,-10c0,-5.51172 -4.48828,-10 -10,-10zM19,5c4.42969,0 8,3.57031 8,8c0,4.42969 -3.57031,8 -8,8c-4.42969,0 -8,-3.57031 -8,-8c0,-4.42969 3.57031,-8 8,-8z"></path></g></g>
        </svg>
    </div>
</div>

<div class="SHOW">
    @foreach ($senhas as $senha)
        <div class="show-box">
            <p>{{ $senha->local }}</p>
            <p class="senha" data-show-pass="{{ $senha->senha }}">
                <span class="senha-text">{{ $senha->senha }}</span>
                <br>
                <button class="btn-visualizar">Visualizar Senha</button>
            </p>
        </div>
    @endforeach
</div>

<script defer>
document.addEventListener('DOMContentLoaded', function() {
    var botoesVisualizar = document.querySelectorAll('.btn-visualizar');

    botoesVisualizar.forEach(function(botao) {
        botao.addEventListener('click', function() {
            var senhaElemento = botao.parentElement;
            var senhaTexto = senhaElemento.querySelector('.senha-text');

            if (senhaTexto.style.display === 'none') {
                senhaTexto.style.display = 'inline';
                botao.textContent = 'Ocultar Senha';
            } else {
                senhaTexto.style.display = 'none';
                botao.textContent = 'Visualizar Senha';
            }
        });
    });
});

</script>

    <a href="/User/{{$page_id}}/addpass" ><button class="contas-inicio">Adicionar conta</button></a>

    <!-- <div class="add-conta">
        Adicionar conta
    </div> -->
    
        <div class="icon-senhas"><svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512"><style>svg{fill:#ffffff}</style><path d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z"/></svg></div>

        <div class="icon-ip"><svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512"><style>svg{fill:#ffffff}</style><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></div>

        <div class="icon-notas"><svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 384 512"><style>svg{fill:#ffffff}</style><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z"/></svg></div>
        
        <div class="icon-pi"><svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 576 512"><style>svg{fill:#ffffff}</style><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 256h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zm256-32H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg></div>

        <div class="icon-add-conta"><svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 640 512"><style>svg{fill:#ffffff}</style><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg></div>

    <div class="config"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><style>svg{fill:#ffffff}</style><path d="M0 416c0 17.7 14.3 32 32 32l54.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 448c17.7 0 32-14.3 32-32s-14.3-32-32-32l-246.7 0c-12.3-28.3-40.5-48-73.3-48s-61 19.7-73.3 48L32 384c-17.7 0-32 14.3-32 32zm128 0a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM320 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm32-80c-32.8 0-61 19.7-73.3 48L32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l246.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48l54.7 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-54.7 0c-12.3-28.3-40.5-48-73.3-48zM192 128a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm73.3-64C253 35.7 224.8 16 192 16s-61 19.7-73.3 48L32 64C14.3 64 0 78.3 0 96s14.3 32 32 32l86.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 128c17.7 0 32-14.3 32-32s-14.3-32-32-32L265.3 64z"/></svg>
        <h3>configurações</h3>
    </div>
    <div class="contato"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><style>svg{fill:#ffffff}</style><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
        <h3>contate-nos</h3>
    </div>
    <div class="avaliar">
        <p>nos avalie</p>
    
        <div class="estrelas">
            <input type="radio" id="cm_star-empty" name="fb" value="" checked/>
            <label for="cm_star-1"><i class="fa"></i></label>
            <input type="radio" id="cm_star-1" name="fb" value="1"/>
            <label for="cm_star-2"><i class="fa"></i></label>
            <input type="radio" id="cm_star-2" name="fb" value="2"/>
            <label for="cm_star-3"><i class="fa"></i></label>
            <input type="radio" id="cm_star-3" name="fb" value="3"/>
            <label for="cm_star-4"><i class="fa"></i></label>
            <input type="radio" id="cm_star-4" name="fb" value="4"/>
            <label for="cm_star-5"><i class="fa"></i></label>
            <input type="radio" id="cm_star-5" name="fb" value="5"/>
          </div>

    </div>

@endsection