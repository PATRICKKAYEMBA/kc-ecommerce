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
    <link rel="stylesheet" href="../style.css"> 
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
                <a href="register.php">Sign up</a>
                
            </nav>
            <div class="search-bar">
                <input type="text" placeholder="Search for products...">
                <button>Search</button>
            </div>
        </div>
    </header>
    <div class="container">
    <div class="sidebar">
        <!-- <h2>Side Bar</h2> -->
         <ul>
            <li><a href="#">Woman's Fashion</a></li>
            <li><a href="#">Men's Fashion</a></li>
            <li><a href="#">Electronics</a></li>
            <li><a href="#">Home & lifestyke</a></li>
            <li><a href="#">Sports $ Outdoor</a></li>
            <li><a href="#">Health $ Beauty</a></li>
        </ul>
    </div>
    <div class="main-content">
        <section class="banner">
            <div class="slider">
                <img src="../images/banner1.jpeg" alt="Banner 1">
                <img src="../images/banner2.jpeg" alt="Banner 2">
                <img src="../images/banner3.jpeg" alt="Banner 3">
                <img src="../images/banner4.jpeg" alt="Banner 4">
                <img src="../images/banner5.jpeg" alt="Banner 5">
            </div>
        </section>
 
    </div>
    </div>

   

    <section class="flash-sales">
        <div>
            <h2>Flash Sales</h2>
        </div>
        <div class="timer">
            <p>Ends in:</p>
            <span>03</span> days
            <span>19</span> hours
            <span>56</span> mins
        </div>
    </section>

    <div>
    <div class="product-grid">
            <div class="product">
                <img src="../images/phones/iphone15.jpeg" alt="Iphone 15">
                <h3>Iphone 15</h3>
                <p class="price">UGX 4,600,000</p>
                <button>Add to Cart</button>
            </div>
            <div class="product">
            <img src="../images/TVs/smart-tv-40.jpeg" alt="smart-tv-40">
                <h3>Smart TV 40 inch</h3>
                <p class="price">UGX 730,700</p>
                <button>Add to Cart</button>
            </div>
        </div>
        <a href="#" class="view-all">View All Products</a>
    </div>

    <section class="best-sellers">
        <h2>Best Selling Products</h2>
        <div class="product-grid">
            <div class="product">
                <img src="../images/bags/handbag1.jpeg" alt="Bag">
                <h3>Ladies HandBag</h3>
                <p class="price">UGX 50,000</p>
                <button>Add to Cart</button>
            </div>
            <div class="product">
                <img src="../images/accessories/headsets1.jpeg" alt="Headsets">
                <h3>JBL Headsets</h3>
                <p class="price">UGX 209,000</p>
                <button>Add to Cart</button>
            </div>
        </div>
        <!-- <button class="view-all">View All Products</button> -->
        <a href="#" class="view-all">View All Products</a>
    </section>

    <section class="new-arrivals">
        <h2>New Arrivals</h2>
        <div class="product-grid">
            <div class="product">
                <img src="../images/phones/samsung-s24-ultra.jpeg" alt="samsung-s24-ultra">
                <h3>Samsung s24 ultra</h3>
                <p class="price">UGX 3,500,000</p>
                <button>Shop Now</button>
            </div>
        </div>
    </section>

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

    <script>
    const slides = document.querySelectorAll('.slider img');
    let currentSlide = 0;

    function showSlide() {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % slides.length; // Cycle through slides
        slides[currentSlide].classList.add('active');
    }

    // Change slide every 5 seconds
    setInterval(showSlide, 5000);
</script>

</body>
</html>
