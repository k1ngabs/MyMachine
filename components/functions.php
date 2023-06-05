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

function deleteUser($connect, $userId){
    try{
        $query = $connect->prepare("delete from user where userId = ?");
        $delete = $query->execute($userId);
        return $delete;
    }catch(PDOException $e){
        echo 'ERROR:'. $e->getMessage();
    }
}

function readUser($connect, $userId){
    try{
        $query = $connect->prepare('select * from user where userId = ?');
        $user  = $query->execute($userId);
        return $user;
    }catch(PDOException $e){
        echo 'ERROR:'. $e->getMessage();
    }
}

function updateUser($connect, $inputArray){
    try{
        $query = $connect->prepare('update user set username = ?, email = ?, password = ? where userId = ?');
        $update = $query->execute($inputArray);
        return $update;
    }catch(PDOException $e){
            echo 'ERROR:'. $e->getMessage();
    }
}
?>