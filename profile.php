<?php
    session_start();

    // Check if user is logged in
    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit;
    }

    // Get user ID from URL (GET)
    $user_id = $_GET['user'] ?? null;
    $user = $_SESSION['user'];

    // Simple check
    if ($user_id != $user['id']) {
        echo "User not found!";
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profile Page</title>
    </head>
    <body>
        <h2>Welcome, <?php echo $user['name']; ?>!</h2>
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>User ID:</strong> <?php echo $user['id']; ?></p>

        <a href="login.php">Logout</a>
    </body>
</html>