<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin_dashboard.php'); // Redirect to the admin dashboard
    exit;
}

// Include your database connection
include('../config/db.php');

// Initialize variables for error messages
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check credentials (replace with your actual validation logic)
    $query = "SELECT * FROM admins WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);
        // Verify password (make sure to use password_hash and password_verify for actual applications)
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $admin['id'];
            header('Location: admin_dashboard.php'); // Redirect to the admin dashboard
            exit;
        } else {
            $error_message = 'Invalid password.';
        }
    } else {
        $error_message = 'No admin found with that username.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store Admin Login</title>
    <link rel="stylesheet" href="../style.css"> <!-- Update with the correct path -->
</head>
<body>
    <header>
        <h1>Admin Login</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
        </nav>
    </header>

    <div class="login-container">
        <h2>Welcome Admin</h2>
        <form action="" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
            <div class="error">
                <?php if ($error_message): ?>
                    <p><?php echo htmlspecialchars($error_message); ?></p>
                <?php endif; ?>
            </div>
        </form>
        <p>Not an admin? <a href="../user/login.php">User Login</a></p>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Chris & Patrick Ventures. All Rights Reserved.</p>
    </footer>
</body>
</html>
