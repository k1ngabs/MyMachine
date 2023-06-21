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
            var_dump($insert);
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

// function readUser($connect, $userId){
//     try{
//         $query = $connect->prepare('select * from users where userId = ?');
//         $user  = $query->execute($userId);
        
//         return $user;
//     }catch(PDOException $e){
//         echo 'ERROR:'. $e->getMessage();
//     }
// }

function updateUser($connect, $inputArray){
    try{
        $query = $connect->prepare('update users set username = ?, email = ?, password = ? where userId = ?');
        $update = $query->execute($inputArray);
        return $update;
    }catch(PDOException $e){
            echo 'ERROR:'. $e->getMessage();
    }
}

#Product Functions#

function insertProd($connect, $prodArray){
    try{
        $query = $connect->prepare('insert into product (name, category) values (?, ?)');
        $insert = $query->execute($prodArray);
        return $insert;
        }catch(PDOException $e){
            echo'ERROR:'. $e->getMessage();
        }
}

function readProd($connect, $prodArray){
    try{
        }catch(PDOException $e){
            echo'ERROR:'. $e->getMessage();
        }
}
function findProdID($connect, $prodName){
    try{
        $query = $connect->prepare('select prodId from product where productName = ?');
        $prodId = $query->execute($prodName);
        return $prodId;
        }catch(PDOException $e){
            echo'ERROR:'. $e->getMessage();
        }
}

function updateProd($connect,$inputArray){
    try{
        $query = $connect->prepare('update product set productName = ?, prodCat = ? where prodId = ?');
        $update = $query->execute($inputArray);
        return $update;
    }catch(PDOException $e){
        echo'ERROR:'. $e->getMessage();
    }
}

function deleteProd($connect,$prodId){
    try{
        $query= $connect->prepare('delete from product where prodId = ?');
        $delete = $query->execute($prodId);
        return $delete;
    }catch(PDOException $e){
        echo'ERROR:'. $e->getMessage();
    }
}

#Category Functions

function insertCat($connect, $catName){
    try{
        $query = $connect->prepare('insert into category (categoryName) values (?)');
        $insert = $query->execute($catName);
        return $insert;
    }catch(PDOException $e){
        echo'ERROR:'. $e->getMessage();
    }
}

function readCat($connect, $catArray){
    try{
    }catch(PDOException $e){
        echo'ERROR:'. $e->getMessage();
    }
}


function findCat($connect, $catName){
    try{
        $query = $connect->prepare('select idCat from category where categoryName = ?');
        $search = $query->execute($catName);
        return $search;
    }catch(PDOException $e){
        echo'ERROR:'. $e -> getMessage();
    }
}
function updateCat($connect,$inputArray){
    try{
        $query = $connect->prepare('update category set categoryName = ? where idCat = ?');
        $update = $query->execute($inputArray);
        return $update;
    }catch(PDOException $e){
        echo'ERROR:'. $e->getMessage();
    }
}


function deleteCat($connect,$idCat){
    try{
        $query= $connect->prepare('delete from product where idCat = ?');
        $delete = $query->execute($idCat);
        return $delete;
    }catch(PDOException $e){
        echo'ERROR:'. $e->getMessage();
    }
}
?>