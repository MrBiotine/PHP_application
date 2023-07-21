<?php
session_start();
function getCartItemCount() {
    if(isset($_SESSION['products'])) {
        return count($_SESSION['products']); // Retourne le nombre d'éléments dans le panier
    } else {
        return 0; // Si le panier est vide, retourne 0
    }
} ?>

<?php
echo "<header>",
        "<nav>",
            "<ul>",
                "<li><a href='index.php'>Ajouter un produit</a></li>",
                "<li>",
                    "<a href='recap.php'>Récapitulatif des produits</a>",
                    "<span class='cart-count'>", getCartItemCount(), "</span> produits",
                "</li>",
            "</ul>",
        "</nav>",
    "</header>";
?>