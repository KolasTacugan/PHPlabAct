<?php
    session_start();

    // Simple hardcoded credentials
    $valid_email = "test@example.com";
    $valid_password = "12345";

    $error = "";

    // Check if form is submitted via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($email === $valid_email && $password === $valid_password) {
            // Store user info in SESSION
            $_SESSION['user'] = [
                "id" => 1,
                "email" => $email,
                "name" => "John Doe"
                ];

            // Redirect to profile page using GET
            header("Location: profile.php?user=1");
            exit;
        } else {
            $error = "Invalid email or password!";
            }
    }
?>

<!DOCTYPE html>
    <html>
    <head>
        <title>Login Page</title>
    </head>
    <body>
        <h2>Login</h2>
        <form method="POST" action="">
            <label>Email:</label><br>
            <input type="text" name="email" required><br><br>

            <label>Password:</label><br>
            <input type="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>

        <p style="color:red;"><?php echo $error; ?></p>
    </body>
</html>
