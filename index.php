<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="loginscript.js"></script>
    <title>Gerenciador de Senhas</title>
</head>
<body>
    <div class="login-container">
        <form onsubmit="return processForm()">
            <label for="email">Email</label>
            <input type="text" id="email" name="Name">
            <label for="senha">Senha</label>
            <input type="text" id="senha" name="Senha">
            <button type="submit">Logar</button>
        </form>
    </div>
    <?php
    require("loginscript.php")


?>
</body>
</html>