<?php
// Start session
session_start();

// Include database connection
include('../config/db.php');

// Initialize the cart session if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Remove item from cart
if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);
}

// Update quantities
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_cart'])) {
    foreach ($_POST['quantities'] as $id => $quantity) {
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id]['quantity'] = $quantity;
        }
    }
}

// Fetch all products in the cart
$cart_products = [];
$total_price = 0;

if (!empty($_SESSION['cart'])) {
    $ids = implode(',', array_keys($_SESSION['cart']));
    $query = "SELECT * FROM products WHERE id IN ($ids)";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $quantity = $_SESSION['cart'][$id]['quantity'];
        $row['quantity'] = $quantity;
        $row['total_price'] = $row['price'] * $quantity;
        $cart_products[] = $row;
        $total_price += $row['total_price'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Your Shopping Cart</h1>
        <nav>
            <a href="index.php">Continue Shopping</a> |
            <a href="login.php">Login</a>
        </nav>
    </header>

    <!-- Cart Content -->
    <div class="cart">
        <h2>Cart Items</h2>

        <?php if (!empty($cart_products)) { ?>
            <form action="cart.php" method="POST">
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart_products as $product) { ?>
                            <tr>
                                <td><?php echo $product['name']; ?></td>
                                <td>$<?php echo number_format($product['price'], 2); ?></td>
                                <td>
                                    <input type="number" name="quantities[<?php echo $product['id']; ?>]" value="<?php echo $product['quantity']; ?>" min="1">
                                </td>
                                <td>$<?php echo number_format($product['total_price'], 2); ?></td>
                                <td>
                                    <a href="cart.php?action=remove&id=<?php echo $product['id']; ?>" class="btn remove-btn">Remove</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="cart-actions">
                    <button type="submit" name="update_cart" class="btn update-btn">Update Cart</button>
                </div>
            </form>

            <div class="cart-summary">
                <h3>Total Price: $<?php echo number_format($total_price, 2); ?></h3>
                <a href="checkout.php" class="btn checkout-btn">Proceed to Checkout</a>
            </div>
        <?php } else { ?>
            <p>Your cart is empty. <a href="index.php">Continue shopping.</a></p>
        <?php } ?>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Chris & Patrick Ventures. All Rights Reserved.</p>
    </footer>

</body>
</html>
