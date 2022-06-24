<?php
/* 
 * Lister les commandes dans un tableau HTML
 * id de la commande
 * nom prenom de l'utilisateur qui a passé la commande
 * montant formaté
 * date de la commande
 * statut
 * date de statut
 * 
 * Passer le statut en liste deroulant avec un bouton Modifier
 * pour changer le statut de la commande en bdd (nécessité un champs caché pour l'id de la commande)
 */

require_once __DIR__ . '/../include/init.php';
adminSecurity();

if (isset($_POST['modifierStatut'])) {
    $query = 'select OSS_ID from T_D_ORDERSTATUS_OSS where OSS_WORDING= :statut';
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':statut' => $_POST['statut']
    ]);
    $statut = $stmt->fetchAll();


    $query = '
    UPDATE T_D_ORDERHEADER_OHR SET
        OSS_ID = ' . $statut[0]['OSS_ID'] . '
   
    WHERE OHR_ID = ' . $_POST['commandeId'] . '';

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    setFlashMessage('Le statut est modifié');
}

// concat_ws(' ', u.prenom, u.nom) //concatenation valeur sql
$query = 'SELECT C.*,U.USR_FIRSTNAME as user_name, U.USR_LASTNAME as user_prenom FROM T_D_ORDERHEADER_OHR C INNER JOIN T_D_USER_USR U ON C.USR_ID = U.USR_ID  ';
$stmt = $pdo->query($query);
$commandes = $stmt->fetchAll();

$statuts = [
    'En cours',
    'Annulé',
    'Livré totalement',
    'Livré partiellement'
];

require __DIR__ . '/../layout/top.php';
?>
<h1>Commande</h1>

<!-- le tableau HTML ici -->
<table class="table_cat th_produits table table-striped">
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date de commande</th>
        <th>Statut</th>
        <th></th>


    </tr>
    <?php


    foreach ($commandes as $commande) :
        //$id_stm = $pdo->query('SELECT nom FROM categories WHERE id='. $item['id'].' ');
        //$produit_cat = $id_stm->fetchAll();
        //dump($commande['date_statut']);  
    ?>
        <tr>
            <td><?= $commande['OHR_ID']; ?></td>
            <td><?= $commande['user_name']; ?></td>
            <td><?= $commande['user_prenom']; ?></td>
            <td><?= datetimeFR($commande['OHR_DATE']); ?></td>

            <td>
                <form method="post" class="form-inline">
                    <select name="statut" class="form-control">
                        <?php
                        foreach ($statuts as $statut) :
                            //faire une verif en BDD pour voir si l'id enregistré dans la commande correspond au libellé de la table statuts via son id
                            $stm = $pdo->query('select OSS_ID,OSS_WORDING from T_D_ORDERSTATUS_OSS where OSS_ID= ' . $statut . ' ');
                            $commande_statut = $stm->fetchAll();

                            $selected = ($commande_statut[0]['OSS_ID'] == $commande['OSS_ID'])
                                ? 'selected'
                                : '';
                        ?>
                            <option value="<?= $statut; ?>" <?= $selected; ?>><?= $statut; ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                    <input type="hidden" name="commandeId" value="<?= $commande['OHR_ID']; ?>">
                    <button type="submit" name="modifierStatut" class="btn btn-primary ">Modifier</button>
                </form>
            </td>


        </tr>

    <?php
    endforeach;
    ?>
</table>


<?php
require __DIR__ . '/../layout/bottom.php';
?>