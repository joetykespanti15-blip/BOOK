<?php 
require_once 'dbConfig.php';

/* --- AUTHOR FUNCTIONS --- */
function getAllApplicants($pdo) {
    $sql = "SELECT * FROM authors ORDER BY date_added DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getApplicantByID($pdo, $author_id) {
    $sql = "SELECT * FROM authors WHERE author_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$author_id]);
    return $stmt->fetch();
}

function insertAuthor($pdo, $fName, $lName, $gender, $spec, $email, $bdate) {
    $sql = "INSERT INTO authors (first_name, last_name, gender, specialization, email, birth_date) VALUES (?,?,?,?,?,?)";
    return $pdo->prepare($sql)->execute([$fName, $lName, $gender, $spec, $email, $bdate]);
}

function updateAuthor($pdo, $fName, $lName, $gender, $spec, $email, $bdate, $author_id) {
    $sql = "UPDATE authors SET first_name=?, last_name=?, gender=?, specialization=?, email=?, birth_date=? WHERE author_id=?";
    return $pdo->prepare($sql)->execute([$fName, $lName, $gender, $spec, $email, $bdate, $author_id]);
}

function deleteAuthor($pdo, $author_id) {
    return $pdo->prepare("DELETE FROM authors WHERE author_id = ?")->execute([$author_id]);
}

/* --- BOOK FUNCTIONS --- */
function getProjectsByWebDev($pdo, $author_id) {
    $sql = "SELECT * FROM books WHERE author_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$author_id]);
    return $stmt->fetchAll();
}

function getProjectByID($pdo, $book_id) {
    $sql = "SELECT * FROM books WHERE book_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$book_id]);
    return $stmt->fetch();
}

function insertBook($pdo, $title, $genre, $author_id) {
    $sql = "INSERT INTO books (book_title, genre, author_id) VALUES (?,?,?)";
    return $pdo->prepare($sql)->execute([$title, $genre, $author_id]);
}

function updateBook($pdo, $title, $genre, $book_id) {
    $sql = "UPDATE books SET book_title = ?, genre = ? WHERE book_id = ?";
    return $pdo->prepare($sql)->execute([$title, $genre, $book_id]);
}

function deleteBook($pdo, $book_id) {
    return $pdo->prepare("DELETE FROM books WHERE book_id = ?")->execute([$book_id]);
}
?>