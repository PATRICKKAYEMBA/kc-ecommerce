<?php
// Start session
session_start();

// Include database connection
include('../config/db.php');

// Fetch all products from the database
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store User</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Welcome to Our E-Commerce Store</h1>
        <nav>
            <a href="cart.php">View Cart</a> |
            <a href="login.php">Login</a>
        </nav>
    </header>

    <!-- Product Listing -->
    <div class="products">
        <h2>Available Products</h2>
        <div class="product-list">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                        <div class='product'>
                            <img src='public/images/{$row['image']}' alt='{$row['name']}' />
                            <h3>{$row['name']}</h3>
                            <p>\${$row['price']}</p>
                            <a href='product_details.php?id={$row['id']}' class='btn'>View Details</a>
                        </div>
                    ";
                }
            } else {
                echo "<p>No products available.</p>";
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Chris & Patrick Ventures. All Rights Reserved.</p>
    </footer>

</body>
</html>
