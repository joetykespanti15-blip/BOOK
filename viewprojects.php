<?php require_once 'core/dbConfig.php'; require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Books</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php">Back to Authors</a>
    <?php $author = getApplicantByID($pdo, $_GET['author_id']); ?>
    <h1>Author: <?php echo $author['first_name'] . " " . $author['last_name']; ?></h1>

    <div style="border: 1px solid black; padding: 20px;">
        <h3>Add New Book</h3>
        <form action="core/handleForms.php?author_id=<?php echo $_GET['author_id']; ?>" method="POST">
            <p>Book Title: <input type="text" name="bookTitle" required></p>
            <p>Genre: <input type="text" name="genre" required></p>
            <input type="submit" name="insertBookBtn" value="Add Book">
        </form>
    </div>

    <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
        <tr>
            <th>ID</th><th>Title</th><th>Genre</th><th>Actions</th>
        </tr>
        <?php $books = getProjectsByWebDev($pdo, $_GET['author_id']); foreach ($books as $book) { ?>
        <tr>
            <td><?php echo $book['book_id']; ?></td>
            <td><?php echo $book['book_title']; ?></td>
            <td><?php echo $book['genre']; ?></td>
            <td>
                <a href="editproject.php?book_id=<?php echo $book['book_id']; ?>&author_id=<?php echo $_GET['author_id']; ?>">Edit</a> | 
                <a href="deleteproject.php?book_id=<?php echo $book['book_id']; ?>&author_id=<?php echo $_GET['author_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>