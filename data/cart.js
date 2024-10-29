let storedCart = JSON.parse(localStorage.getItem('cart'));

// Ensure cart is initialized as an array
export let cart = Array.isArray(storedCart) ? storedCart : [
    {
        productId: 'e43638ce-6aa0-4b85-b27f-e1d07eb678c6',
        quantity: 2,
        deliveryOptionId: '1'
    },
    {
        productId: '15b6fc6f-327a-4ec4-896f-486349e85a3d',
        quantity: 1,
        deliveryOptionId: '2'
    }
];

// Function to save cart to local storage
function saveToStorage() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Function to add a product to the cart
export function addToCart(productId) {
    let matchingItem;

    cart.forEach((cartItem) => {
        if (productId === cartItem.productId) {
            matchingItem = cartItem;
        }
    });

    if (matchingItem) {
        matchingItem.quantity += 1;
    } else {
        cart.push({
            productId: productId,
            quantity: 1,
            deliveryOptionId: '1' // Default delivery option
        });
    }
    saveToStorage();
}

// Function to remove a product from the cart
export function removeFromCart(productId) {
    // Filter out the product to be removed
    cart = cart.filter(cartItem => cartItem.productId !== productId);
    saveToStorage();
}

export function updateDeliveryOption(productId, deliveryOptionId) {
    let matchingItem;

    cart.forEach((cartItem) => {
        if (productId === cartItem.productId) {
            matchingItem = cartItem;
        }
    });

    matchingItem.deliveryOptionId = deliveryOptionId;

    saveToStorage();
}