<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
} 

$user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>E-Commerce Homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/shared/general.css">
    <link rel="stylesheet" href="styles/shared/header.css">
    <link rel="stylesheet" href="styles/pages/dashboard.css">
  </head>
  <body>
    <div class="header">
      <div class="header-left-section">
        <a href="dashboard.php" class="header-link">
          <img class="logo"
            src="images/our-logo.png">
        </a>
      </div>

      <div class="header-middle-section">
        <input class="search-bar" type="text" placeholder="Search">

        <button class="search-button">
          <img class="search-icon" src="images/icons/search-icon.png">
        </button>
      </div>

      <div class="header-right-section">
        <a class="cart-link header-link" href="logout.php">Logout</a>

        <a class="orders-link header-link" href="orders.php">
          <span class="returns-text">Returns</span>
          <span class="orders-text">& Orders</span>
        </a>

        <a class="cart-link header-link" href="checkout.php">
          <img class="cart-icon" src="images/icons/cart-icon.png">
          <div class="cart-quantity js-cart-quantity">0</div>
          <div class="cart-text">Cart</div>
        </a>
      </div>
    </div>
    
    <div class="main">
      <div class="products-grid js-products-grid">
        
      </div>
    </div>

    
    
    <script type="module" src="scripts/dashboard.js"></script>
    
  </body>
</html>
