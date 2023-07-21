
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Récapitulatif des produits</title>
</head>
  
<body>
   <?php 
   include 'header.php' ;
    /*check if the key "products* does'nt exist or if it doesn't contain any data */
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo "<p>Aucun produit en session...</p>";        
    }
    else{
        echo "<table>",
                "<thead>",/* array header in HTML */
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                        "<th>Action</th>",
                    "</tr>",
                "</thead>",
            "<tbody>";
        $totalGeneral = 0; /* initialize a new var $totalGeneral a t zero */
        foreach($_SESSION['products'] as $index => $product){
            echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td>".$product['qtt']."</td>",
                    "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td><a href=\"remove-product.php?delete=".$index."\">Supprimer</a></td>",
                "</tr>";
                $totalGeneral += $product['total'] ;                      
                             
        }
        echo "<tr>",
        
                "<td colspan=4>Total général : </td>",/*colspan=4 => merge the first 4 columns  */
                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                "<td><a href=\"remove-product.php?clear=1\">Supprimer tout</a></td>",

            "</tr>";


        /* The number_format() function in PHP is used to format a numeric value with grouped thousands and decimal separators. 
        
        example : 
        $number = 12345.6789;
        $formattedNumber = number_format($number, 2, '.', ',');
        echo $formattedNumber; // Output: 12,345.68

        1.Number: The numeric value that you want to format.
        2.Decimal Places: The number of decimal places to display in the formatted number.
        3.Decimal Separator: The character used as the decimal separator.
        4.Thousands Separator: The character used as the thousands separator.

        */
        echo "</tbody>",
            "</table>";
    }
    ?>
</body>
</html>