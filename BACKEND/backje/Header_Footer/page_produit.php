<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Accueil </title>
</head>
<body>   
 <?php

 
 // HEADER

 include "header.php";

 echo '<div class="zone-produits">';


include "functions.php";
$produitModel=new ModeleProduct(0);
$produitStatement=$produitModel->RecupProduit($_GET['idProduit']);
$produit = $produitStatement->fetchAll();


         
                      
                      echo'<button class="button-54" role="button" onclick = "history.back()" >Retour au catalogue</button>';
                      


    echo '<div id="produit'.$produit[0]['PRD_ID'].'" class="produits">';
    echo '<div class ="container-image">';
    echo '<img src="'.$produit[0]['PRD_PICTURE'].'"/>';
    echo '</div> ';
    echo '<h2 class="titre">'.$produit[0]['PRD_DESCRIPTION'].'</h2>';
    echo '<p class="description">'.$produit[0]['PRD_DEFINITION'].'</p>';
    echo '<h2 class="prix">'.$produit[0]['PRD_PRICE'].' </h2>';

    echo '<span id"bouton_catalogue"><a href="panier.php?action=ajout&amp;l=LIBELLEPRODUIT&amp;q=QUANTITEPRODUIT&amp;p=PRIXPRODUIT"" onclick="window.open(this.href, \'\', 
    \'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350\'); return false;" > </a></span>';

echo '</div>';




include "footer.php"?>






<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>