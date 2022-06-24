<?php
require_once __DIR__ . '/Include/init.php';

require __DIR__ . '/layout/top.php';
?>

<body>
    <?php
    echo '<div class="zone-produits">';


    require __DIR__ .'/Model/ProduitModel.php';
    $produitModel = new ModeleProduct(0);
    $produitStatement = $produitModel->RecupProduit($_GET['idProduit']);
    $produit = $produitStatement->fetchAll();

    $image;
    if (is_null($produit[0]['PRD_PICTURE'])) {
        $image = "img/kit.png";
    } else {
        $image = $produit[0]['PRD_PICTURE'];
    }

    echo '<div id="produit' . $produit[0]['PRD_ID'] . '" class="produits">';
    echo '<div class ="container-image">';
    echo '<img src="' . $image . '"/>';
    echo '</div> ';
    echo '<h2 class="titre">' . $produit[0]['PRD_DESCRIPTION'] . '</h2>';
    echo '<p class="typeProduit">' . $produit[0]['PTY_DESCRIPTION'] . '</p>';
    echo '<h2 class="prix">' . $produit[0]['PRD_PRICE'] . ' </h2>';

    echo '<a href="panier.php?action=ajout&amp;id_produit=' . $produit[0]['PRD_ID'] . '&amp;quantite=1" onclick="window.open(this.href, \'\', 
       \'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350\'); return false;"  class="add-to-cart btn btn-primary">Ajouter au panier</a>';
    echo '</div>';

    echo '</div>;';



    ?>
    <?php

    require __DIR__ . '/layout/bottom.php';
    ?>






    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>