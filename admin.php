<?php
// Process the image upload if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['product-image'])) {
    // Check if the image file is valid
    $targetDir = "images/products/"; // Folder where images will be saved
    $targetFile = $targetDir . basename($_FILES["product-image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    // Check if the file is an actual image
    if (getimagesize($_FILES["product-image"]["tmp_name"])) {
        if (move_uploaded_file($_FILES["product-image"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["product-image"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - Add Products</title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="text"], input[type="file"], input[type="number"], button {
            padding: 10px;
            width: 300px;
            margin: 10px 0;
        }

        .product-list {
            margin-top: 30px;
        }

        .product {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 15px;
        }

        .product img {
            max-width: 150px;
        }

        #image-preview {
            margin-top: 10px;
            max-width: 200px;
            display: none;
        }
    </style>
</head>
<body>
    <h1>Admin - Add New Product</h1>

    <form id="add-product-form">
        <div class="form-group">
            <input type="text" id="product-name" placeholder="Product Name" required>
        </div>
        <div class="form-group">
            <input type="file" id="product-image" accept="image/*" required>
            <div>
                <img id="image-preview" src="" alt="Image Preview">
            </div>
        </div>
        <div class="form-group">
            <input type="number" id="product-price" placeholder="Price in Cents" required>
        </div>
        <div class="form-group">
            <input type="text" id="product-keywords" placeholder="Keywords (comma separated)" required>
        </div>
        <button type="submit">Add Product</button>
    </form>

    <h2>Products Added</h2>
    <div id="products-list" class="product-list"></div>

    <script>
        // Function to generate a UUID for the product ID
        function generateUUID() {
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                var r = Math.random() * 16 | 0,
                    v = c === 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }

        // Event listener for file input to preview the image
        document.getElementById('product-image').addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                // Once the file is loaded, display the image in the preview
                reader.onload = function(e) {
                    document.getElementById('image-preview').src = e.target.result;
                    document.getElementById('image-preview').style.display = 'block';
                };

                // Read the image file as data URL
                reader.readAsDataURL(file);
            } else {
                document.getElementById('image-preview').style.display = 'none';
            }
        });

        // Event listener for form submission
        document.getElementById('add-product-form').addEventListener('submit', function(event) {
            event.preventDefault();

            // Collect product data from the form
            const name = document.getElementById('product-name').value;
            const image = document.getElementById('product-image').files[0];
            const price = parseInt(document.getElementById('product-price').value, 10);
            const keywords = document.getElementById('product-keywords').value.split(',');

            // Generate a new product ID using UUID
            const productId = generateUUID();

            // Create a product object
            const newProduct = {
                id: productId,
                image: `images/products/${image.name}`, // Image path assuming image is uploaded
                name: name,
                rating: {
                    stars: 0,  // Default stars
                    count: 0   // Default review count
                },
                priceCents: price,
                keywords: keywords
            };

            // For now, simulate saving the image and logging the product object
            console.log(newProduct);

            // Save product to localStorage
            saveProductToLocalStorage(newProduct);

            // Optionally upload image to server here, if needed
            // handleImageUpload(image);
        });

        // Function to save product to localStorage
        function saveProductToLocalStorage(product) {
            let products = JSON.parse(localStorage.getItem('products')) || [];
            products.push(product);
            localStorage.setItem('products', JSON.stringify(products));
            loadProducts(); // Reload the product list after saving
        }

        // Function to load and display products from localStorage
        function loadProducts() {
            const products = JSON.parse(localStorage.getItem('products')) || [];
            let productsHTML = '';

            products.forEach(product => {
                productsHTML += `
                    <div class="product">
                        <img src="${product.image}" alt="${product.name}">
                        <h3>${product.name}</h3>
                        <p>Price: $${(product.priceCents / 100).toFixed(2)}</p>
                        <p>Rating: ${product.rating.stars} stars (${product.rating.count} reviews)</p>
                        <p>Keywords: ${product.keywords.join(', ')}</p>
                    </div>
                `;
            });

            document.getElementById('products-list').innerHTML = productsHTML;
        }

        // Load products when the page is ready
        window.onload = loadProducts;
    </script>
</body>
</html>
