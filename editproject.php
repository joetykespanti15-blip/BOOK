<?php require_once 'core/dbConfig.php'; require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Edit Book</title></head>
<body>
    <a href="viewprojects.php?author_id=<?php echo $_GET['author_id']; ?>">Cancel</a>
    <h1>Edit Book</h1>
    <?php $book = getProjectByID($pdo, $_GET['book_id']); ?>
    <form action="core/handleForms.php?book_id=<?php echo $_GET['book_id']; ?>&author_id=<?php echo $_GET['author_id']; ?>" method="POST">
        <p>Book Title: <input type="text" name="bookTitle" value="<?php echo $book['book_title']; ?>"></p>
        <p>Genre: <input type="text" name="genre" value="<?php echo $book['genre']; ?>"></p>
        <input type="submit" name="editBookBtn" value="Update Book">
    </form>
</body>
</html>