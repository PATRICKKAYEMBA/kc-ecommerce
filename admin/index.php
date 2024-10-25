<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin') {
    header('Location: login.php');
    exit();
}

// Include database connection
include('../config/db.php');

// Fetch data counts for display on the dashboard
$product_count_query = "SELECT COUNT(*) AS count FROM products";
$order_count_query = "SELECT COUNT(*) AS count FROM orders";
$user_count_query = "SELECT COUNT(*) AS count FROM users WHERE role = 'customer'";

$product_count = mysqli_fetch_assoc(mysqli_query($conn, $product_count_query))['count'];
$order_count = mysqli_fetch_assoc(mysqli_query($conn, $order_count_query))['count'];
$user_count = mysqli_fetch_assoc(mysqli_query($conn, $user_count_query))['count'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!-- Admin Header -->
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <a href="product_management.php">Manage Products</a> |
            <a href="order_management.php">View Orders</a> |
            <a href="customer_management.php">Manage Customers</a> |
            <a href="../logout.php">Logout</a>
        </nav>
    </header>

    <!-- Dashboard Content -->
    <div class="admin-dashboard">
        <h2>Overview</h2>
        <div class="dashboard-cards">
            <div class="card">
                <h3>Total Products</h3>
                <p><?php echo $product_count; ?></p>
            </div>
            <div class="card">
                <h3>Total Orders</h3>
                <p><?php echo $order_count; ?></p>
            </div>
            <div class="card">
                <h3>Total Customers</h3>
                <p><?php echo $user_count; ?></p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Chris & Patrick Ventures. All Rights Reserved.</p>
    </footer>
</body>
</html>
