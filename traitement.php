<?php
session_start();

/* Function to add a product to the cart with a success message */
function addProductToCart($name, $price, $qtt){
    /*Associative Array "Key"(name) => "value" (input)*/
    $product = [
        "name" => $name,
        "price" => $price,
        "qtt" => $qtt,
        "total" => $price*$qtt,
    ];
    /*store the array product in SG $_SESSION with the key 'products'*/
    $_SESSION['products'][] = $product;

    // The product has been successfully added, generate a success message
    $_SESSION['success_message'] = "Le produit \"$name\" (Quantité: $qtt) a été ajouté au panier.";
} 

// Function to show an error message with an invitation to enter a valid value
function showError($error) {
    $_SESSION['error_message'] = "Error: $error. Please enter a valid value.";
}

/*check if the key "submit" exist*/
if(isset($_POST['submit'])){

    /*we use a set of filters to filter, sanitize, validate the data*/
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);/*remove all special characters and  tags HTML, prevent injection code */
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);/*FILTER_FLAG_ALLOW_FRACTION add a rule to allow the use of ","(comma) or dot*/
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); 

    /*filter_input return only 3 values :
    -the filter data
    -or false, -or null */

    if($name && $price && $qtt){
        addProductToCart($name, $price, $qtt);
    } else {
        showError();    
    } 
    


}
/*then perform a redirect to index.php */
header("Location:index.php");


?>