<?php
require_once __DIR__ . '/Include/init.php';

require __DIR__ . '/layout/top.php';
?>
<?php

if (isset($_SESSION['commandecree'])){
       setFlashMessage('Commande n° '.$_SESSION['commandecree'] .' créée');
       unset($_SESSION['commandecree']);
}

echo '<div id="product-box" class="box-container">';
echo '<h1 class="title"> Nos produits : </h1><br>';
// echo '<div class="center"';
echo '<div class="container-card">';

require __DIR__ .'/Model/ProduitModel.php';
$produitModel = new ModeleProduct(0);
$produitStatement = $produitModel->lireProduits();
$produits = $produitStatement->fetchAll();

// On affiche chaque produit un à un
foreach ($produits as $produit) {
       $image;
       if (is_null($produit['PRD_PICTURE'])) {
              $image = "img/kit.png";
       } else {
              $image = $produit['PRD_PICTURE'];
       }

       echo '<form action="page_produit.php" method="GET">';
       echo '<div name="idProduit" id="produit' . $produit['PRD_ID'] . '" 
       class="card-produit card-' . $produit['PRD_ID'] . '">';
       echo '<div class="container-image">';
       echo '<a href="page_produit.php?idProduit=' . $produit['PRD_ID'] . '">
       <img src="' . $image . '" alt="Produit : ID = ' . $produit['PRD_ID'] . '">';
       echo '</a></div> ';
       echo '<h3 class="card-title">' . $produit['PRD_DESCRIPTION'] . '</h3>';
      echo '<p class="prix">' . $produit['PRD_PRICE'] . ' euros</p>';
       echo '<a href="panier.php?action=ajout&amp;id_produit=' . $produit['PRD_ID'] . '&amp;quantite=1" 
       onclick="window.open(this.href, \'\', 
       \'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes,
        copyhistory=no, width=600, height=350\'); return false;"
          class="add-to-cart btn btn-primary">Ajouter au panier</a>';
      echo '</div>';
       echo '</form>';
}

echo '</div>';
echo '</div>'; ?>
<?php

require __DIR__ . '/layout/bottom.php';
?>