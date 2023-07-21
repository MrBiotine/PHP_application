<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajout produit</title>
</head>

<body>
    <?php include 'header.php' ;?>
    <h1>Ajouter un produit</h1>
    <form action="traitement.php" method="post">
        <p>
            <label>
                Nom du produit :
                <input type="text" name="name">
            </label>
        </p>
        <p>    
            <label>
                Prix du produit :
                <input type="number" step="any" name="price">
            </label>
        </p>
        <p>    
            <label>
                Quantité désirée :
                <input type="number" name="qtt" value="1">
            </label>
        </p>
        <p>
            <input id="add-button" type="submit" name="submit" value="Ajouter le produit">
        </p>

    </form>
    <div class="message-box">
        <?php
        // Display the success message if it exists in the session
        if(isset($_SESSION['success_message'])) {
            echo "<div class='success-message'>", $_SESSION['success_message'], "</div>";
            unset($_SESSION['success_message']); // Clear the message after displaying
        }

        // Display the error message if it exists in the session
        if(isset($_SESSION['error_message'])) {
            echo "<div class='error-message'>", $_SESSION['error_message'], "</div>";
            unset($_SESSION['error_message']); // Clear the message after displaying
        }
        ?>
    </div>
</body>
</html>