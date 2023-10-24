

<?php $__env->startSection('title', 'login'); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="cadastro-container">

    <div class="titulo1"><h1>Key Guardian</h1></div>     

    <form id="Cadastro" method="POST" action="<?php echo e(route('cadastro-store')); ?>">
    <?php echo csrf_field(); ?>
        <input type="text" name="usuario" placeholder="Usuario" class="input-user-email-senha" required>

        <input type="email" name="email" placeholder="Email" class="input-user-email-senha" required>

        <input type="password" name="senha" placeholder="Senha" class="input-user-email-senha" required>

        <input type="password" name="confirm-senha" placeholder="Confirmar Senha" class="input-user-email-senha" required>

        <input type="submit" name="submit" class="botao-cadastro" placeholder="Cadastro">
    
    </form>z
    <a href="/" class="botao-voltar">Voltar</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\rafae\OneDrive\Área de Trabalho\Laravel TCC\gerenciador-de-senhas\resources\views/gerenciador/create.blade.php ENDPATH**/ ?>