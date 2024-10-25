<?php
include('../config/db.php');

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    // Check if email is already registered
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $error = "Email already exists!";
    } else {
        // Insert new user
        $query = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$hashed_password', 'customer')";
        if (mysqli_query($conn, $query)) {
            $success = "Account created successfully! You can now log in.";
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header>
        <h1>Welcome to ChrisPat Shopping</h1>
        <nav>
            <a href="#">Home</a>
            <a href="#">Shop</a>
            <a href="#">Contact</a>
        </nav>
    </header>

    <div class="login-container">
        <div class="login-image">
            <img src="../images/empty-cart-image.jpeg">
        </div>
        <div>
            <h2>Create a New Account</h2>

            <?php if ($error != ""): ?>
            <p class="error"><?php echo $error; ?></p>
            <?php elseif ($success != ""): ?>
            <p style="color:green;"><?php echo $success; ?></p>
            <?php endif; ?>

            <form method="POST" action="register.php">
            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Register</button>
            </form>

            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
        
    </div>
    <footer>
        <div class="container">
            <div class="footer-links">
                <div>
                    <h3>Support</h3>
                    <p>Contact us: support@chrispat.tech</p>
                </div>
                <div>
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Returns</a></li>
                    </ul>
                </div>
            </div>
            <p>&copy; 2024 Chris & Patrick ventures. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
