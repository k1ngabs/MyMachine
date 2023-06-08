<?php
require_once('connect.php');
require_once('functions.php');

#___________________________USER CRUD_____________________#
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
        $_SESSION['userId'] = $userLogged;
    }else{
        echo'Senha ou Usuário inválido.';
    }
}

#Logout
    if(isset($_POST['logout'])){
        session_start();
        session_destroy();
    }

    
#Read User
    if(isset($_SESSION['userId'])){
        $userId = $_SESSION['userId'];
        $infoArray = readUser($connect, $userId);
        #TERMINAR#
    }
    
#Update User
    if(isset($_POST['updateUser'])){
        $userId = $_SESSION['userId'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $inputArray = [$username, $email, $password, $userId];
        updateUser($connect,$inputArray);
    }
    
#Delete User
    if(isset($_POST['deleteUser'])){
        $userId = $_SESSION['userId'];
        deleteUser($connect, $userId);
    }

    #_______________________PRODUCT CRUD________________________#
    
#Create Product
    if(isset($_POST['prodCad'])){
        $prodName = $_POST['prodName'];
        $prodCat = $_POST['prodCat'];
        $prodArray = [$prodName, $prodCat];
        insertProd($connect, $prodArray);
    }

#Read Product
    if(isset($_POST['searchProd'])){
        $prodName = $_POST['search'];
        $infoArray = readUser($connect, $prodName);
        #TERMINAR#
    }

#Update Product
    if(isset($_POST['updateProd'])){
        $prodName = $_POST['prodName'];
        $catName = $_POST['catName'];
        $idCat = findCat($connect, $catName);
        $prodId = findProdID($connect, $prodName);
        $inputArray = [$prodName, $idCat, $prodId];
        updateProd($connect,$inputArray);
    }

#Delete Product
    if(isset($_POST['deleteProd'])){
        $prodName = $_POST['prodName'];
        $prodId = findProdID($connect, $prodName);
        deleteProd($connect,$prodId);
    }

    #_______________________CATEGORY CRUD________________________#

#Create Category
if(isset($_POST['catCad'])){
    $catName = $_POST['catName'];
    insertCat($connect, $catName);
}

#Read Category
    if(isset($_POST['searchCat'])){
        #TERMINAR      
    }

#Update Category
    if(isset($_POST['updateCat'])){
        $catName = $_POST['catName'];
        $idCat = findCat($connect, $catName);
        $inputArray = [$catName, $idCat];
        updateCat($connect,$inputArray);
    }

#Delete Category
    if(isset($_POST['deleteCat'])){
        $catName = $_POST['catName'];
        $idCat = findCat($connect, $catName);
        deleteCat($connect,$idCat);
    }
?>