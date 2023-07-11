<?php
 require_once('connect.php');

function signUp($connect, $array){
    try{
            $query = $connect->prepare("insert into users (username, email, password) values (?, ?, ?)");
            $insert = $query->execute($array);
            return $insert;
        } catch (PDOException $e) {
            echo 'ERROR: '. $e->getMessage();
    }
}

function passwordVerify($connect, $loginInput){
    try{
            $query = $connect->prepare("select password, userId, admin from users where username = ? or email = ?");
            $array = [$loginInput, $loginInput];
            $insert = $query->execute($array);
            $hashFetch = $query->fetch();
            return $hashFetch;
    } catch (PDOException $e){
        echo 'ERROR: '. $e->getMessage();
    }
}


function userVerification($connect, $emailInput){
    try{
        $query = $connect->prepare('update users set verified = TRUE where userId = ?');
        $update = $query->execute($emailInput);
        return $update;
    }catch(PDOException $e){
        echo'ERROR:'. $e->getMessage();
    }
}

function deleteUser($connect, $userId){
    try{
        $query = $connect->prepare("delete from users where userId = ?");
        $delete = $query->execute($userId);
        return $delete;
    }catch(PDOException $e){
        echo 'ERROR:'. $e->getMessage();
    }
}

function readUser($connect, $userId){
    try{
        $query = $connect->prepare('select * from users where userId = ?');
        $query->execute($userId);
        $user = $query->fetch();
        return $user;
    }catch(PDOException $e){
        echo 'ERROR:'. $e->getMessage();
        var_dump($user);
    }
}

function updateUser($connect, $inputArray){
    try{
        $query = $connect->prepare('update users set username = ?, email = ?, password = ? where userId = ?');
        $update = $query->execute($inputArray);
        return $update;
    }catch(PDOException $e){
            echo 'ERROR:'. $e->getMessage();
    }
}

function pesquisarPessoaEmail($connect,$array){
    try {

    $query = $connect->prepare("select * from users where md5(email) = ?");
    if($query->execute($array)){
        $pessoa = $query->fetch(); //coloca os dados num array $pessoa
      if ($pessoa)
        {  
            return $pessoa;
        }
    else
        {
            return false;
        }
    }
    else{
        return false;
    }
     }catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
  }  
}

function alterarStatustrue($conexao, $array){
    try {
        session_start();
        $query = $conexao->prepare("update users set verified = true where userId = ?");
        $resultado = $query->execute($array);       
        return $resultado;
    }catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

#Product Functions#

function insertProd($connect, $prodArray){
    try {
        $query = $connect->prepare('INSERT INTO product (prodId) VALUES (?)');
        $query->execute($prodArray);
        $insert = $query->fetch();
        return $insert;
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}

function checkCount($connect, $prodArray){
    $query = $connect->prepare('SELECT COUNT(*) FROM product WHERE prodId = ?');
    $query->execute($prodArray);
    $count = $query->fetch();   
    if ($count[0] > 0) {
        // Produto já existe, não inserir dnv
        return false;
    }else{ return true;}
}

function readProd($connect, $prodArray){
    try{
        $query = $connect->prepare('SELECT (*) FROM product where prodId = ? or prodTitle = ?');
        $query->execute($prodArray);
        $select = $query->fetch();
        return $select;
        }catch(PDOException $e){
            echo'ERROR:'. $e->getMessage();
        }
}
// function findProdID($connect, $prodName){
//     try{
//         $query = $connect->prepare('select prodId from product where productName = ?');
//         $prodId = $query->execute($prodName);
//         return $prodId;
//         }catch(PDOException $e){
//             echo'ERROR:'. $e->getMessage();
//         }
// }

function updateProd($connect,$inputArray){
    try{
        $query = $connect->prepare('UPDATE product SET prodTitle = ? where prodId = ?');
        $update = $query->execute($inputArray);
        return $update;
    }catch(PDOException $e){
        echo'ERROR:'. $e->getMessage();
    }
}

function deleteProd($connect,$prodId){
    try{
        $query= $connect->prepare('DELETE FROM product WHERE prodId = ?');
        $delete = $query->execute($prodId);
        return $delete;
    }catch(PDOException $e){
        echo'ERROR:'. $e->getMessage();
    }
}

#____________________________________________________________________________________________________#

function createList($connect, $userArray){
    try {
        $query= $connect->prepare('INSERT INTO lists (userId) VALUES (?) ');
        $insert = $query->execute($userArray);
        return $insert;
        }catch(PDOException $e){
            echo'ERROR:'. $e->getMessage();
        }
}

function getNewList($connect, $userArray){
    try {
        $query= $connect->prepare('SELECT MAX(listId) FROM lists WHERE userId = (?)');
        $query->execute($userArray);
        $select = $query->fetch();
        return $select;
        }catch(PDOException $e){
            echo'ERROR:'. $e->getMessage();
        }
}

function createProdList($connect,$arrayId){
    try {
        $query= $connect->prepare('INSERT INTO prodlist (prodId, listId) VALUES (?, ?)');
        $query->execute($arrayId);
        $insert = $query->fetch();
        return $insert;
        }catch(PDOException $e){
            echo'ERROR:'. $e->getMessage();
        }
}

function readLists($connect, $userId){
    try {
        $query= $connect->prepare('SELECT listId FROM lists WHERE userId = ? ');
        $query->execute($userId);
        $select = $query->fetch();
        return $select;
        }catch(PDOException $e){
            echo'ERROR:'. $e->getMessage();
        }
}
?>