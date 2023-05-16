<?php
require_once('conect.php');
require_once('functions.php');

#User SignUp
if(isset($_POST['signup'])){
    $user = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $array = array($user, $email, $password);
    signUp($conect, $array);
}
?>