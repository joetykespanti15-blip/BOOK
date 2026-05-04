<?php
require_once 'dbConfig.php';
require_once 'models.php';

/* --- AUTHOR HANDLERS --- */
if (isset($_POST['insertAuthorBtn'])) {
    if (insertAuthor($pdo, $_POST['fName'], $_POST['lName'], $_POST['gender'], $_POST['spec'], $_POST['email'], $_POST['bdate'])) {
        header("Location: ../index.php");
        exit();
    }
}

if (isset($_POST['editBtn'])) {
    if (updateAuthor($pdo, $_POST['fName'], $_POST['lName'], $_POST['gender'], $_POST['spec'], $_POST['email'], $_POST['bdate'], $_GET['author_id'])) {
        header("Location: ../index.php");
        exit();
    }
}

if (isset($_POST['deleteBtn'])) {
    if (deleteAuthor($pdo, $_GET['author_id'])) {
        header("Location: ../index.php");
        exit();
    }
}

/* --- BOOK HANDLERS --- */
if (isset($_POST['insertBookBtn'])) {
    if (insertBook($pdo, $_POST['bookTitle'], $_POST['genre'], $_GET['author_id'])) {
        header("Location: ../viewprojects.php?author_id=" . $_GET['author_id']);
        exit();
    }
}

if (isset($_POST['editBookBtn'])) {
    if (updateBook($pdo, $_POST['bookTitle'], $_POST['genre'], $_GET['book_id'])) {
        header("Location: ../viewprojects.php?author_id=" . $_GET['author_id']);
        exit();
    }
}

if (isset($_POST['deleteProjectBtn'])) {
    if (deleteBook($pdo, $_GET['book_id'])) {
        header("Location: ../viewprojects.php?author_id=" . $_GET['author_id']);
        exit();
    }
}
?>