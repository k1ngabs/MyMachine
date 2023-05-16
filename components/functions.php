<?php
 include_once('conect.php');

signUp($conect, $array){
    try {
            $query = $conect->prepare("insert into user (username, email, password) values (?, ?, ?)");
            $insert = $query->execute($array);
            return $insert;
        } catch (PDOException $e) {
            echo 'ERRO: '. $e->getMessage()
    }
}

?>