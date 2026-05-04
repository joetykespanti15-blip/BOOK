<?php require_once 'core/dbConfig.php'; require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html>
<body>
    <?php $book = getProjectByID($pdo, $_GET['book_id']); ?>
    <div style="border: 1px solid black; padding: 20px;">
        <h1>Delete Book: <?php echo $book['book_title']; ?>?</h1>
        <form action="core/handleForms.php?book_id=<?php echo $_GET['book_id']; ?>&author_id=<?php echo $_GET['author_id']; ?>" method="POST">
            <input type="submit" name="deleteProjectBtn" value="Confirm Delete">
            <a href="viewprojects.php?author_id=<?php echo $_GET['author_id']; ?>">Cancel</a>
        </form>
    </div>
</body>
</html>