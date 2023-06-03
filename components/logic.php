<?php
require_once('connect.php');
require_once('functions.php');
#User SignUp
if(isset($_POST['signup'])){
    $user = $_POST['username'];
    $email = $_POST['email'];
    $crudePassword = $_POST['password'];
    $password = password_hash($crudePassword, PASSWORD_DEFAULT);
    $array = array($user, $email, $password);
    signUp($connect, $array);
}

#User Login
if(isset($_POST['login'])){
    $user= $_POST['loginInput'];
    $password= $_POST['password'];
    $hash= passwordVerify($connect,$user);
    if(password_verify($password,$hash)){
        $userLogged= userVerify($connect, $user); 
        session_start();
        $_SESSION['loggedIn'] = true;
        $_SESSION[''];
    }else{
        echo'senha invalida';
    }

}
?>