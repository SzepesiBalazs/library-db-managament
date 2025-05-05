<?php
$host = '127.0.0.1:3006';   // MySQL host
$dbname = 'library_db';    // Database name (replace with your own DB)
$username = 'root';     // MySQL username
$password = 'Kelmen66';         // MySQL password (empty if you used no password for root)

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to the database successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

