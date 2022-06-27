<?php
// Liste produits dans un tableau HTML
//tous les champs sauf description
//bonu:
//afficher le nom de la categorie au lieu de son id 

require_once __DIR__ . '/../include/init.php';
adminSecurity();

// lister les catégories dans un tableau HTML

// le requêtage ici
$stmt = $pdo->query('SELECT P.*,T.PTY_DESCRIPTION FROM T_D_PRODUCT_PRD P inner join  `t_d_producttype_pty`T ON P.PTY_ID=T.PTY_ID ');
$produit = $stmt->fetchAll();

/*
 * $query = <<<SQL
 * SELECT P.*, C.nom AS cat_name   
 * FROM produit P
 * JOIN categorie C ON p.categorie_id = C.id
 * SQL;

 */

require __DIR__ . '/../layout/top2.php';
?>

<h1>Gestion Produits</h1>

<p><a href="produit-edit.php">Ajouter un produit</a></p>

<!-- le tableau HTML ici -->
<table class="table_cat th_produits table table-striped">
    <tr>
        <th>Id</th>
        <th>Code</th>
        <th>Description</th>
        <th>Type Produit</th>
        <th>Prix</th>
        <th></th>
        
    </tr>
    <?php
    foreach ($produit as $item) :
      
    ?>
    <tr>
        <td><?= $item['PRD_ID']; ?></td>
        <td><?= $item['PRD_CODE']; ?></td>
        <td><?= $item['PRD_DESCRIPTION']; ?></td>
        <td><?= $item['PTY_DESCRIPTION']; ?></td>
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

