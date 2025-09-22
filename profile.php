<?php
    session_start();

    // Check if user is logged in
    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit;
    }

    $user_id = $_GET['user'] ?? null;
    $user = $_SESSION['user'];
    if ($user_id != $user['id']) {
        echo "User not found!";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #001f3f; /* Navy Blue */
            min-height: 100vh;
            color: white;
        }
        .navbar-custom {
            background-color: #fdf5e6; /* Cream */
            padding: 10px 20px;
            border-radius: 0; /* remove curve since it’s full width */
            margin-bottom: 20px;
            width: 100%;
        }
        .nav-link.active {
            background-color: #001f3f !important; /* Navy */
            color: #fdf5e6 !important; /* Cream */
        }
        .card-custom {
            background-color: #fdf5e6; /* Cream */
            border-radius: 15px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.3);
            margin-top: 20px;
        }
        .alert-custom {
            margin-top: 20px;
        }
        .logo-img {
            height: 40px;
            object-fit: contain;
            margin-right: 15px;
        }
    </style>
</head>
<body>

    <!-- Full-width Nav with Logo -->
    <ul class="nav nav-pills navbar-custom align-items-center">
        <img src="images/logo.png" alt="Logo" class="logo-img">
        <li class="nav-item">
            <a class="nav-link active" href="#">Profile</a>
        </li>
    </ul>

    <div class="container mt-3">

        <!-- Success Alert -->
        <div class="alert alert-success alert-custom" role="alert">
            Successfully logged in!
        </div>

        <!-- User Card -->
        <div class="card card-custom mx-auto" style="width: 22rem;">
            <img class="card-img-top" src="images/profile.jpg" alt="Profile Picture">
            <div class="card-body text-center">
                <h5 class="card-title">Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h5>
                <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <p class="card-text"><strong>User ID:</strong> <?php echo $user['id']; ?></p>
                <a href="logout.php" class="btn btn-danger w-100">Logout</a>
            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
