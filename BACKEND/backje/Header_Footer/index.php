


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="CSS/style.css">
    <title>Accueil </title>
</head>
<body>   
 <?php
 // HEADER
 include "header.php";





 echo "<main>";

echo '<div id="contenant"> ';

 $mysqlConnection = new PDO('mysql:host=localhost;dbname=menuiz;charset=utf8', 'root', '');
 $produitStatement = $mysqlConnection->prepare('SELECT * FROM T_D_PRODUCT_PRD');
 ?>

<?php
include "functions.php";
$produitModel=new ModeleProduct(0);
$produitStatement=$produitModel->lireProduits();
$produits = $produitStatement->fetchAll();

// On affiche chaque produit un à un
foreach ($produits as $produit) {
     

// echo "<p> ". $produit['PRD_DESCRIPTION']." </p>";


    echo '<form action="page_produit.php" method="GET">';
    echo '<div name ="idProduit" id="produit'.$produit['PRD_ID'].'" class="produits">';
    echo '<div class ="container-image">';
    echo '<a href="page_produit.php?idProduit='.$produit['PRD_ID'].'"><img src="'.$produit['PRD_PICTURE'].'"/>';
    echo '</a></div> ';
    echo '<p class="titre">'.$produit['PRD_DESCRIPTION'].'</p>';
    echo '<p class="prix">'.$produit['PRD_PRICE'].' </p>';

    echo '<span id"bouton_catalogue"><a href="panier.php?action=ajout&amp;l=LIBELLEPRODUIT&amp;q=QUANTITEPRODUIT&amp;p=PRIXPRODUIT"" onclick="window.open(this.href, \'\', 
    \'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350\'); return false;" > </a></span>';
    echo '</div>';
    echo '</form>';
}

?>

 <?php
 echo "</main>";
    // FOOTER
     include "footer.php";
?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>