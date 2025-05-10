<?php 

require "connection.php";
require "update_book_availability.php";

function borrowingBook($pdo, $user_id, $book_id, $borrow_date, $return_date){
    $sql = "INSERT INTO borrowed_books (user_id, book_id, borrow_date, return_date) VALUES (:user_id, :book_id, :borrow_date, :return_date)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":user_id" => $user_id,
        ":book_id" => $book_id,
        ":borrow_date" => $borrow_date,
        ":return_date" => $return_date,
    ]);

    echo "Borrowed the book succesfully!";
}

borrowingBook($pdo, 1, 1, '2025-05-07', '2025-05-21');
updateBookAvailability($pdo, $book_id, false);