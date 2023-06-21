<?php 
include_once('components/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/2292112.svg" type="image/x-icon">
    <link rel="stylesheet" href="components/registerStyle.css">
    <title>MyMachine Sign Up</title>
</head>
<body>
    <div id="blublu">
    <a href="index.php">
      <div id="logo">
        <img src="images/2292112.svg" alt="" height="40px">
        <header>MyMachine</header>
      </div>
    </a>
        <form class="signup" action="components/logic.php" method="post">
            <p><label for="username">Usuário:</label><br><input type="text" name="username" id="username" required></p>
            <p><label for="email">Email:</label><br><input type="email" name="email" id="email" required></p>
            <p><label for="password">Senha:</label><br><input type="password" name="password" id="password" required></p>
            <p><label for="confirmPassword">Confirmar senha:</label><br><input type="password" name="confirmPassword" id="confirmPassword" required></p>
            <p><button type="submit" name="signup" id="signup">Cadastrar</button></p>
        </form>
    </div>
</body>
</html>