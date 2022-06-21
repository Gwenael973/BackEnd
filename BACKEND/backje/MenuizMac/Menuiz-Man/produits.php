<?php
include "functions.php";
$produitModel=new ModeleProduct(0);
$produitStatement=$produitModel->lireProduits();
$produits = $produitStatement->fetchAll();

echo '<div id="product-box" class="box-container">';
echo '<div class="container-card">';
// On affiche chaque produit un à un
foreach ($produits as $produit) {
     




    echo '<form action="page_produit.php" method="GET">';
    echo '<div id="card-'.$produit['PRD_ID'].'" class="card-produit card-'.$produit['PRD_ID'].'">';
    echo '<div name ="idProduit" id="produit'.$produit['PRD_ID'].'" class="produits">';
    echo '<div class ="container-image">';
    echo '<a href="page_produit.php?idProduit='.$produit['PRD_ID'].'"><img src="'.$produit['PRD_PICTURE'].'"/>';
    echo '</a></div> ';
    echo '<p class="titre">'.$produit['PRD_DESCRIPTION'].'</p>';
    echo '<p class="prix">'.$produit['PRD_PRICE'].' </p>';


    echo '<span id"bouton_catalogue"><a href="panier.php?action=ajout&amp;l='.$produit['PRD_DESCRIPTION'].'&amp;q=1&amp;p='.$produit['PRD_PRICE'].'"  onclick="window.open(this.href, \'\', 
    \'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350\'); return false;" > </a></span>';
    echo '</div>';
    echo '</div>';
    echo '</form>';
}

    echo '</div>';
    echo '</div>';
