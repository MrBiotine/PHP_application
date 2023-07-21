<?php
session_start();
// Supprimer un produit spécifique
if(isset($_GET['delete']) && isset($_SESSION['products'])) {
    $productId = $_GET['delete'];

    // Vérifier si l'ID du produit existe dans le panier
    if(isset($_SESSION['products'][$productId])) {
        unset($_SESSION['products'][$productId]); // Supprimer le produit du panier
    }
}

// Supprimer tous les produits
if(isset($_GET['clear'])) {
    unset($_SESSION['products']); // Supprimer tous les produits du panier
}

// Redirection vers recap.php
header("Location: recap.php");
exit();
