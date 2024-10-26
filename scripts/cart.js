document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function() {
        const productId = this.getAttribute('data-product-id');
        alert(productId);
        // Send the productId to the server or update the cart in localStorage
        addToCart(productId);
    });
});

function addToCart(productId) {
    // Update cart data (this can be localStorage or server call)
    console.log('Product added to cart: ' + productId);
}
