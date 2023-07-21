<?php
session_start();

function getCartItemCount() {
    if(isset($_SESSION['products'])) {
        return count($_SESSION['products']); // Retourne le nombre d'éléments dans le panier
    } else {
        return 0; // Si le panier est vide, retourne 0
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma super application</title>
    <link rel="stylesheet" href="style.css"> <!-- Inclure le lien vers le fichier CSS -->
</head>
<body>
    <header>
        <nav>
            <ul class="menu-list">
                <li><a href="index.php">Ajouter un produit</a></li>
                <li>
                    <a href="recap.php">Récapitulatif des produits</a>
                    <span class="cart-count"><?php echo getCartItemCount(); ?></span> produits
                </li>
            </ul>
        </nav>
    </header>
