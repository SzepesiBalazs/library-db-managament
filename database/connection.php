<?php
$host = '127.0.0.1:3006';  
$dbname = 'library_db';    
$username = 'root';     
$password = 'Kelmen66';        

try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

