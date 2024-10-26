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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Homepage</title>
    <link rel="stylesheet" href="style.css"> 
    <script src="scripts/cart.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>Exclusive</h1>
            </div>
            <nav>
                <a href="#">Home</a>
                <a href="#">Contact</a>
                <a href="#">About</a>
                <a href="cart.php">View Cart</a> 
            </nav>
            <div class="search-bar">
                <input type="text" placeholder="Search for products...">
                <button>Search</button>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="#">Woman's Fashion</a></li>
                <li><a href="#">Men's Fashion</a></li>
                <li><a href="#">Electronics</a></li>
                <li><a href="#">Home & Lifestyle</a></li>
                <li><a href="#">Sports & Outdoor</a></li>
                <li><a href="#">Health & Beauty</a></li>
            </ul>
        </div>
        <div class="main-content">
            <!-- Your banner and other content goes here -->

            <section class="product-section">
                <h2>Products</h2>
                <div class="product-grid">
                    <?php
                    // Sample product data array
                    $products = [
                        [
                            'id' => 1,
                            'name' => 'iPhone 15',
                            'price' => 'UGX 4,600,000',
                            'image' => 'images/phones/iphone15.jpeg'
                        ],
                        [
                            'id' => 2,
                            'name' => 'Smart TV 40 inch',
                            'price' => 'UGX 730,700',
                            'image' => 'images/TVs/smart-tv-40.jpeg'
                        ],
                        [
                            'id' => 3,
                            'name' => 'Ladies HandBag',
                            'price' => 'UGX 50,000',
                            'image' => 'images/bags/handbag1.jpeg'
                        ],
                        [
                            'id' => 4,
                            'name' => 'JBL Headsets',
                            'price' => 'UGX 209,000',
                            'image' => 'images/accessories/headsets1.jpeg'
                        ],
                        [
                            'id' => 5,
                            'name' => 'Samsung S24 Ultra',
                            'price' => 'UGX 3,500,000',
                            'image' => 'images/phones/samsung-s24-ultra.jpeg'
                        ],
                        [
                            'id' => 5,
                            'name' => 'Samsung S24 Ultra',
                            'price' => 'UGX 3,500,000',
                            'image' => 'images/phones/samsung-s24-ultra.jpeg'
                        ]
                    ];

                    // Loop through the products and display them
                    foreach ($products as $product) {
                        echo '<div class="product">';
                        echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '">';
                        echo '<h3>' . $product['name'] . '</h3>';
                        echo '<p class="price">' . $product['price'] . '</p>';
                        echo '<button class="add-to-cart" data-product-id="' . $product['id'] . '">Add to Cart</button>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </section>
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
            <p>&copy; 2024 Chris & Patrick Ventures. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="scripts/general.js"></script>
    <script src="scripts/cart.js"></script>
</body>
</html>
