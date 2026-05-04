<?php require_once 'core/dbConfig.php'; require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html>
<body>
    <?php $user = getApplicantByID($pdo, $_GET['author_id']); ?>
    <div style="border: 1px solid black; padding: 20px;">
        <h1>Delete Author: <?php echo $user['first_name']; ?>?</h1>
        <form action="core/handleForms.php?author_id=<?php echo $_GET['author_id']; ?>" method="POST">
            <input type="submit" name="deleteBtn" value="Confirm Delete">
            <a href="index.php">Cancel</a>
        </form>
    </div>
</body>
</html>