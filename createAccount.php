<?php 
include_once('components/conect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMachine Sign Up</title>
</head>
<body>
    <div class="signup">
        <form action="components/logic.php" method="post">
            <p><label for="username">Usuário:</label><input type="text" name="username" id="username"></p>
            <p><label for="email">Email:</label><input type="email" name="email" id="email"></p>
            <p><label for="password">Senha:</label><input type="password" name="password" id="password"></p>
            <p><label for="confirmPassword">Confirmar senha:</label><input type="password" name="confirmPassword" id="confirmPassword"></p>
            <p><button type="submit" name="signup" id="signup">Cadastrar</button><button type="reset">Resetar</button></p>
        </form>
    </div>
</body>
</html>