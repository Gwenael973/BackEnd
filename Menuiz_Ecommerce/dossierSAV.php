<?php
require_once __DIR__ . '/Include/init.php';

require __DIR__ . '/layout/top2.php';
adminSecurity();

// lister les catégories dans un tableau HTML

// le requêtage ici
$stmt = $pdo->query('SELECT P.*,T.PTY_DESCRIPTION FROM T_D_PRODUCT_PRD P inner join  `t_d_producttype_pty`T ON P.PTY_ID=T.PTY_ID ');
$produit = $stmt->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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






    
</body>
</html>





















<?php

require __DIR__ . '/layout/bottom.php';
?>
