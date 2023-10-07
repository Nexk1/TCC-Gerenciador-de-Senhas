<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <script src="cadastro.js"></script>
    <title>Cadastro</title>
</head>
<body>
    <p id="teste">AAAaaa</p>
    <div class="cadastro-container">
        <form id="Cadastro">
            <input type="text" id="usuario" name="Usuario" placeholder="Usuario" class="input-user-email-senha" required>

            <input type="email" id="email" name="Email" placeholder="Email" class="input-user-email-senha" required>

            <input type="password" id="senha" name="Senha" placeholder="Senha" class="input-user-email-senha" required>

            <input type="password" id="confirm-senha" name="Confirm-senha" placeholder="Confirmar Senha" class="input-user-email-senha" required>

            <button onclick="cadastrar()" class="botao-cadastro">CADASTRAR</button>
        </form>
    </div>
<?php include 'cadastro.php';?>
</body>
</html>