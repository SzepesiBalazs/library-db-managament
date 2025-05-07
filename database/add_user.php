<?php

require "connection.php";

function addUser($pdo, $username, $password, $email, $name, $registration_date)
{

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password, email, name, registration_date) VALUES (:username, :password, :email, :name, :registration_date)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":username" => $username,
        ":password" => $hashedPassword,
        ":email" => $email,
        ":name" => $name,
        ":registration_date" => $registration_date
    ]);

    echo "User added succesfully!";
}

addUser($pdo, "szepiBazsi", "asdf1234", "szepesi.balazs0924@gmail.com", "Szepesi Balázs", "2025-05-07");