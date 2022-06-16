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
    echo '<p> Gwen le débilos</p>';
    echo '<p class="prix">'.$produit['PRD_PRICE'].' </p>';

    echo '<a href="panier.php?action=ajout&amp;l=LIBELLEPRODUIT&amp;q=QUANTITEPRODUIT&amp;p=PRIXPRODUIT" onclick="window.open(this.href, \'\', 
\'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350\'); return false;"  class="add-to-cart btn btn-primary">Ajouter au panier</a>';
    echo '</div>';
    echo '</form>';
}
