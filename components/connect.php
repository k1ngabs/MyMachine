<?php
   try {
   $connect = new PDO('mysql:host=localhost; dbname=mymachine; charset=utf8', 'usuario' , 'senha');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
?>