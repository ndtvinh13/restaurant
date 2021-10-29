<?php 
    $host="localhost";
    $db="restaurant_db";
    $user="root";
    $pass="";
    $charset='utf8mb4';

    $dns="mysql:host=$host;dbname=$db;charset=$charset";


    try {
        $pdo = new PDO($dns, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo"Gooddddd";

    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
        echo "Error...!!!";
    }
?>