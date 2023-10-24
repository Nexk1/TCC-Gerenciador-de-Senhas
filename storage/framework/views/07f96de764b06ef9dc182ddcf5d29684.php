

<?php $__env->startSection('title', 'login'); ?>

<?php $__env->startSection('content'); ?> 
    <div class="login-container">

    <div class="titulo1"><h1>Key Guardian</h1></div>

    <form>
        

        <input type="email" id="email" name="Email" placeholder="Email" class="input-user-email-senha" required>

        <input type="password" id="senha" name="Senha" placeholder="Senha" class="input-user-email-senha" required>
        
    
        
        
        <button id="submit" class="botao-login" value="true">Entrar</button>        
        <div class="mini-texto1"><a href="teste">Esqueceu a senha? &nbsp;</a></div>
        <div class="mini-texto2"><a href="/create">Criar conta </a></div> 
        
        

    </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rafae\OneDrive\Área de Trabalho\Laravel TCC\gerenciador-de-senhas\resources\views/gerenciador/index.blade.php ENDPATH**/ ?>