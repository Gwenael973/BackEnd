<?php
// Liste produits dans un tableau HTML


require_once __DIR__ . '/../include/init.php';
adminSecurity();



// le requêtage ici
$stmt = $pdo->query('SELECT P.* FROM T_D_PRODUCT_PRD P ');
$produit = $stmt->fetchAll();



require __DIR__ . '/../layout/top.php';
?>

<h1>Gestion Produits</h1>

<p><a href="produit-edit.php">Ajouter un produit</a></p>

<!-- le tableau HTML ici -->
<table class="table_cat th_produits table table-striped">
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prix</th>
        <th></th>
        
    </tr>
    <?php
    foreach ($produit as $item) :
        //$id_stm = $pdo->query('SELECT nom FROM categories WHERE id='. $item['id'].' ');
        //$produit_cat = $id_stm->fetchAll();
        //dump($produit_cat);
    ?>
    <tr>
        <td><?= $item['PRD_ID']; ?></td>
        <td><?= $item['PRD_DESCRIPTION']; ?></td>
      
        <td><?=  prixFR($item['PRD_PRICE']); ?></td>
     
        <td>
            <a class="btn btn-primary"
               href="produit-edit.php?id=<?= $item['PRD_ID']; ?>">
               Modifier
            </a>
        <a class="btn btn-danger"
               href="produit-delete.php?id=<?= $item['PRD_ID']; ?>" onclick="myFunction()">
               Supprimer
            </a>
        </td>
    </tr>
    
    <?php
    endforeach;
    ?>
</table>

<?php
require __DIR__ . '/../layout/bottom.php';
?>

