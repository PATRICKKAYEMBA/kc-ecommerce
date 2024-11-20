<!-- <?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}

$user_name = $_SESSION['user_name'];
?> -->


<!DOCTYPE html>
<html>
  <head>
    <title>Checkout</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/shared/general.css">
    <link rel="stylesheet" href="styles/pages/checkout/checkout-header.css">
    <link rel="stylesheet" href="styles/pages/checkout/checkout.css">
  </head>
  <body>
    <div class="header">
      <div class="header-content">
        <div class="checkout-header-left-section">
        <a href="dashboard.php" class="header-link">
          <button class="place-order-button button-primary">Back</button>
        </a>
        </div>

        <div class="checkout-header-middle-section">
          Checkout (<a class="return-to-home-link"
            href="amazon.php">3 items</a>)
        </div>

        <div class="checkout-header-right-section">
          <img src="images/icons/checkout-lock-icon.png">
        </div>
      </div>
    </div> 

    <div class="main">
      <div class="page-title">Review your order</div>

      <div class="checkout-grid">
        <div class="order-summary js-order-summary">
          
        </div>

        <div class="payment-summary js-payment-summary">
          <div class="payment-summary-title">
            Order Summary
          </div>

          <div class="payment-summary-row">
            <div>Items (3):</div>
            <div class="payment-summary-money">$42.75</div>
          </div>

          <div class="payment-summary-row">
            <div>Shipping &amp; handling:</div>
            <div class="payment-summary-money">$4.99</div>
          </div>

          <div class="payment-summary-row subtotal-row">
            <div>Total before tax:</div>
            <div class="payment-summary-money">$47.74</div>
          </div>

          <div class="payment-summary-row">
            <div>Estimated tax (10%):</div>
            <div class="payment-summary-money">$4.77</div>
          </div>

          <div class="payment-summary-row total-row">
            <div>Order total:</div>
            <div class="payment-summary-money">$52.51</div>
          </div>

          <button class="place-order-button button-primary">
            Place your order
          </button>
        </div>
      </div>
    </div>
    <script type="module" src="scripts/checkout.js"></script>
  </body>
</html>
