<?php
 require_once('connect.php');

function signUp($connect, $array){
    try{
            $query = $connect->prepare("insert into user (username, email, password) values (?, ?, ?)");
            $insert = $query->execute($array);
            return $insert;
        } catch (PDOException $e) {
            echo 'ERROR: '. $e->getMessage();
    }
}

function passwordVerify($connect, $loginInput){
    try{
            $query = $connect->prepare("select password from user where username = ? or email = ?");
            $array = [$loginInput, $loginInput];
            $insert = $query->execute($array);
            return $insert;
    } catch (PDOException $e){
        echo 'ERROR: '. $e->getMessage();
    }
}

function userVerify($connect, $user){
    try{
        $query = $connect->prepare("select userId from user where username = ? or email = ?");
        $array= [$user, $user];
        $userVerified = $query->execute($array);
        return $userVerified;
    }catch(PDOException $e){
        echo 'ERROR: '. $e->getMessage();
    }
}

?>