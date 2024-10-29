<!-- <?php
// Start session
session_start();

// Include database connection
include('config/db.php');

// Fetch all products from the database
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store User</title>
     <link rel="stylesheet" href="styles/style.css"> 
    <link rel="stylesheet" href="styles/shared/general.css">
    <link rel="stylesheet" href="styles/shared/header.css">
    <link rel="stylesheet" href="styles/pages/dashboard.css">
</head>
<body>
    <header>
     <div class="index-header">
     <div class="header-left-section">
        <a href="dashboard.php" class="header-link">
          <img class="logo"
            src="images/our-logo.png">
        </a>
      </div>

      <div class="header-middle-section">
      <h1>Welcome to Our E-Commerce Store</h1>
     </div>

     <div class="header-right-section">
     <nav>
            <a href="login.php">Login</a>
            <a href="register.php">Sign up</a>
        </nav>
     </div>
    
     </div> 
     </header> 

     <div class="hero-section">
     <div class="sidebar">
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Exclusive Items</a></li>
        <li><a href="#">Best Sellers</a></li>
        <li><a href="#">New Arrivals</a></li>
        <li><a href="#">Contact Us</a></li>
    </ul>
    </div>

    <div class="hero">
    <img class="hero-content" src="images/banner1.jpeg" alt="banner1">
    <img class="hero-content" src="images/banner2.jpeg" alt="banner2">
    <img class="hero-content" src="images/banner3.jpeg" alt="banner3">
    <img class="hero-content" src="images/banner4.jpeg" alt="banner4">
    <img class="hero-content" src="images/banner5.jpeg" alt="banner5">
    <img class="hero-content" src="images/banner6.png" alt="banner6">
    </div>
     </div>
    


    <!-- Product Listing -->
    <div class="products">
        <h2>Available Products</h2>
        <div class="products-grid js-products-grid"></div>
        <a href="#" class="view-all">View All Products</a>
     </div>

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Chris & Patrick Ventures. All Rights Reserved.</p>
    </footer>
    <script type="module" src="scripts/dashboard.js"></script>
    <script src="scripts/general.js"></script>
</body>
</html>
