<?php
session_start(); // Start the session if it's not already started

// Check if item_name, item_price, and quantity are provided in the request
if (isset($_GET['item_name']) && isset($_GET['item_price']) && isset($_GET['quantity'])) {
    // Get the item information from the request
    $itemName = $_GET['item_name'];
    $itemPrice = $_GET['item_price'];
    $quantity = $_GET['quantity'];

    // Initialize the cart session variable if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Check if the item already exists in the cart
    $itemIndex = -1;
    foreach ($_SESSION['cart'] as $index => $cartItem) {
        if ($cartItem['item_name'] === $itemName) {
            $itemIndex = $index;
            break;
        }
    }

    // If the item exists in the cart, update its quantity
    if ($itemIndex !== -1) {
        $_SESSION['cart'][$itemIndex]['quantity'] += $quantity;
    } else {
        // Otherwise, add the item to the cart
        $_SESSION['cart'][] = array(
            'item_name' => $itemName,
            'item_price' => $itemPrice,
            'quantity' => $quantity
        );
    }

    // Return a success message to the JavaScript function
    echo "Item added to cart successfully!";
} else {
    // Return an error message if any required parameter is missing
    echo "Error: Missing parameters!";
}
?>
