document.getElementById('add-product-form').addEventListener('submit', function(event) {
    event.preventDefault();

    // Collect product data from the form
    const name = document.getElementById('product-name').value;
    const image = document.getElementById('product-image').files[0];
    const price = parseInt(document.getElementById('product-price').value, 10);
    const keywords = document.getElementById('product-keywords').value.split(',');

    // Generate a new product ID using UUID
    const productId = generateUUID();

    // Create a FormData object
    const formData = new FormData();
    formData.append('product-name', name);
    formData.append('product-price', price);
    formData.append('product-keywords', keywords.join(','));
    formData.append('product-image', image);

    // Send the form data to the server via AJAX
    fetch('admin.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log('Product uploaded successfully', data);
        // Optionally, save product to localStorage as well
        saveProductToLocalStorage({
            id: productId,
            image: `images/products/${image.name}`,
            name: name,
            rating: {
                stars: 0,
                count: 0
            },
            priceCents: price,
            keywords: keywords
        });
        loadProducts(); // Reload the products list after saving
    })
    .catch(error => {
        console.error('Error uploading product:', error);
    });
});
