<?php
   try {
   $conect = new PDO("pgsql:host=localhost; port=5432; dbname=mymachine; user=postgres; password=senha5");
    $conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
?>