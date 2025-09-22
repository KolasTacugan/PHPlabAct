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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #001f3f; /* Navy Blue */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-card {
            background-color: #fdf5e6; /* Cream */
            border-radius: 15px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.3);
        }
        .login-card h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            color: #001f3f;
        }
        .error-text {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
        /* 🔹 Custom Navy Button */
        .btn-navy {
            background-color: #001f3f;
            color: #fdf5e6; /* Cream text */
            border: none;
        }
        .btn-navy:hover {
            background-color: #003366; /* Slightly lighter navy */
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h2>Login</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email address</label>
                <input type="email" class="form-control" id="emailInput" name="email" placeholder="Enter email" required>
                <div class="form-text">We'll never share your email with anyone else.</div>
            </div>
            
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password" required>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            
            <!-- 🔹 Navy Login Button -->
            <button type="submit" class="btn btn-navy w-100">Login</button>
        </form>

        <?php if ($error): ?>
            <p class="error-text"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
