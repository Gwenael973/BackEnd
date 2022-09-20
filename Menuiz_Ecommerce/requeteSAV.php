<?php


require_once __DIR__ . '/include/init.php';
require __DIR__ .'/layout/top.php';
$query = 'SELECT C.*,U.USR_FIRSTNAME as user_name, U.USR_LASTNAME as user_prenom 
FROM T_D_ORDERHEADER_OHR C 
INNER JOIN T_D_USER_USR U ON C.USR_ID = U.USR_ID where U.USR_id= ' . $_SESSION['utilisateur']['id'];
$stmt = $pdo->query($query);
$commandes = $stmt->fetchAll();




?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    
    , initial-scale=1.0">
    <title></title>
</head>
<body>
    <H1 class="offset-3"> Création de la requête SAV</H1>
 
<form>
<table class="table_cat th_produits table table-striped">
    <tr>
        <th>Numéro de commande</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date de commande</th>
        <th>Statut</th>
      

    </tr>
    <?php


    foreach ($commandes as $commande) :
     
    ?>
        <tr>
            <td><?= $commande['OHR_NUMBER']; ?></td>
            <td><?= $commande['user_name']; ?></td>
            <td><?= $commande['user_prenom']; ?></td>
            <td><?= datetimeFR($commande['OHR_DATE']); ?></td>
    
            <td>
                <?php

                //faire une verif en BDD pour voir si l'id enregistré dans la commande correspond au libellé de la table statuts via son id
                $stm = $pdo->query('select OSS_ID,OSS_WORDING from T_D_ORDERSTATUS_OSS where OSS_ID= ' . $commande['OSS_ID'] . ' ');
                $commande_statut = $stm->fetchAll();

                echo $commande_statut[0]['OSS_WORDING'];
                ?>

            </td>
         


        </tr>

    <?php
    endforeach;
    ?>
</table>




  <div class="form-group  pt-5  ">
    <label for="exampleFormControlSelect1">Type de requète</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>N'habite pas à l'adresse indiquée</option>
      <option>Non présent à la livraison</option>
      <option>Erreur client lors de la commande</option>
      <option>Erreur de préparation</option>
      <option>Service après vente</option>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description du problème </label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  value="tsdDescription" name="tsdDescription" ></textarea>
  </div>
  <input type="hidden" name="commandeId" value="">
                    <button type="submit" name="modifierStatut" class="btn btn-primary ">Envoyer</button>
                </form>
</form>













</body>
</html>


<?php



require __DIR__ .'/layout/bottom.php';
?>

