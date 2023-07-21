<?php
session_start();

// Function to increase the quantity of a product
function increaseQuantity($productId) {
    if(isset($_SESSION['products'][$productId])) {
        $_SESSION['products'][$productId]['qtt']++;
        $_SESSION['products'][$productId]['total'] = $_SESSION['products'][$productId]['price'] * $_SESSION['products'][$productId]['qtt'];
    }
}

// Function to decrease the quantity of a product or remove it if the quantity reaches 0
function decreaseQuantity($productId) {
    if(isset($_SESSION['products'][$productId])) {
        $_SESSION['products'][$productId]['qtt']--;
        $_SESSION['products'][$productId]['total'] = $_SESSION['products'][$productId]['price'] * $_SESSION['products'][$productId]['qtt'];

        // If the quantity reaches 0, remove the product from the cart
        if($_SESSION['products'][$productId]['qtt'] <= 0) {
            unset($_SESSION['products'][$productId]);
        }
    }
}

// Function to delete a specific product from the cart
function deleteProduct($productId) {
    if(isset($_SESSION['products'][$productId])) {
        unset($_SESSION['products'][$productId]);
    }
}

// Function to clear the entire cart (remove all products)
function clearCart() {
    unset($_SESSION['products']);
}

// Handle the cart modification actions using the GET parameters
if(isset($_GET['action'])) {
    $action = $_GET['action'];
    $productId = $_GET['id'];

    // Use a switch statement to determine the action and call the corresponding function
    switch ($action) {
        case 'increase':
            increaseQuantity($productId);
            break;
        case 'decrease':
            decreaseQuantity($productId);
            break;
        case 'delete':
            deleteProduct($productId);
            break;
        case 'clear':
            clearCart();
            break;
    }

    // Redirect to recap.php after cart modification
    header("Location: recap.php");
    exit();
}
?>
