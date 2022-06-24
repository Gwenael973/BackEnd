<?php
require_once __DIR__ . '/include/init.php';

require __DIR__ . '/Model/PaymentTypeModel.php';
require __DIR__ . '/Model/ExpeditionTypeModel.php';
require __DIR__ . '/Model/AddressModel.php';
require __DIR__ . '/Model/ExpeditionModel.php';
require __DIR__ . '/Model/OrderHeaderModel.php';
require __DIR__ . '/Model/OrderDetailModel.php';

$bCreateAdrLiv = false;
$bCreateAdrFac = false;
$errors = [];
$idPaymentType;
$idExpeditionType;
$idOrderHeader = 0;
$idadrfac = 0;
$idadrliv = 0;
$exp_p = '';
$pai_p = '';
$adrf_p = '';
$adrl_p = '';

// pour construire le SELECT des types de paiement 
$typepaiement = new ModelePaymentType();
$payments = $typepaiement->RecupPaymentTypeAll()->fetchAll();
// pour construire le SELECT des types d'expedition'
$typeexpe = new ModeleExpeditionType();
$expeditions = $typeexpe->RecupExpeditionTypeAll()->fetchAll();


//pour construire le select des adresses
$adrm = new ModeleAddress();
$adresses = $adrm->RecupAddressByUser($_SESSION['utilisateur']['id'])->fetchAll();


if (!empty($_POST)) {
    sanitizePost();
    extract($_POST);

    if (empty($_POST['paiement'])) {
        $errors[] = "Le type de paiement est obligatoire";
    }
    if (empty($_POST['expedition'])) {
        $errors[] = 'Le type d expedition est obligatoire';
    }


    //Tester l'adresse

    //on va enregistrer la commande
    if (empty($errors)) {


        // si le type de paiement n'est pas encore dans la commande
        if (!isset($idPaymentType)) {
            //on appelle Ajouterpaiement de fonctions
            $idPaymentType = (int)ajouterPaiement($_POST['paiement']);
        }

        // si le type d'expedition n'est pas encore dans la commande
        if (!isset($idExpeditionType)) {
            $idExpeditionType = (int)AjouterExpedition($_POST['expedition']);
        }
        try {


            $adresse = new ModeleAddress();
            $idadrfac = (int) $_POST['adrfac'];
            if ($idadrfac == 0) {
                //création adresse facturation
                $idadrfac = $adresse->InsertAddress(
                    $_SESSION['adresseFac']['prenom'],
                    $_SESSION['adresseFac']['nom'],
                    $_SESSION['adresseFac']['adresse1'],
                    $_SESSION['adresseFac']['adresse2'],
                    $_SESSION['adresseFac']['adresse3'],
                    $_SESSION['adresseFac']['code_postal'],
                    $_SESSION['adresseFac']['ville'],
                    $_SESSION['adresseFac']['pays'],
                    $_SESSION['adresseFac']['mail'],
                    $_SESSION['adresseFac']['phone']
                );
                $bCreateAdrFac = true;
            }


            $idadrliv = (int) $_POST['adrliv'];
            if ($idadrliv == 0) {
                //on vérifie si l'adresse saisie n'est pas la même que l'adresse saisie juste avant

                if ($_SESSION['adresseFac']['completadress'] != $_SESSION['adresseLiv']['completadress']) {         //création adresse facturation
                    $idadrliv = $adresse->InsertAddress(
                        $_SESSION['adresseLiv']['prenom'],
                        $_SESSION['adresseLiv']['nom'],
                        $_SESSION['adresseLiv']['adresse1'],
                        $_SESSION['adresseLiv']['adresse2'],
                        $_SESSION['adresseLiv']['adresse3'],
                        $_SESSION['adresseLiv']['code_postal'],
                        $_SESSION['adresseLiv']['ville'],
                        $_SESSION['adresseLiv']['pays'],
                        $_SESSION['adresseLiv']['mail'],
                        $_SESSION['adresseLiv']['phone']
                    );
                    $bCreateAdrLiv = true;
                } else { // on est dans le cas où c'est la même adresse qui a été saisie pour création 2 fois....
                    $idadrliv = $idadrfac;
                }
            }

            $orderheader = new ModeleOrderHeader();
            $idOrderHeader = $orderheader->InsertOrderHeader(
                $idadrliv,
                $idadrfac,
                $idPaymentType,
                $idExpeditionType,
                $_SESSION['utilisateur']['id']
            );

            $expedition = new ModeleExpedition();
            $idExpedition = $expedition->InsertExpedition();

            // INSERT INTO detail_commande 

            foreach ($_SESSION['panier'] as $produitId => $produit) {
                $orderdetail = new ModeleOrderDetail();
                $orderdetail->InsertOrderDetail($idOrderHeader, (int)$produit['id'], (int)$produit['quantite'], (int)$idExpedition);
                //       
            }

            //on vide la variable de session Panier
            $_SESSION['panier'] = [];
            //on vide les variables de session Adresse
            $_SESSION['adresseFac'] = [];
            $_SESSION['adresseLiv'] = [];

            $_SESSION['commandecree']='ORDER'. $idOrderHeader;
            header('Location: index.php');
            die;
        } catch (Exception $e) {
            //En cas d'erreur sur un insert, on va supprimer tous les enregistrements, pour eviter d'avoir des enregistrements fantômes
            // qui ne seraient liés à rien....
            setFlashMessage('Erreur : ' . $e->getMessage(), "\n");
        }
    }
}

require __DIR__ . '/layout/top.php';
?>
<h1>Confirmation commande</h1>


<form method="post" class="inscrip_form" enctype="multipart/form-data">


    <div class="form-group">
        <label>Paiement</label>
        <select name="paiement" class="form-control">
            <option value=""></option>
            <?php
            foreach ($payments as $pai) :
                $selected = ($pai['PMT_WORDING'] == $pai_p)
                    ? 'selected'
                    : '';
            ?>
                <option value="<?= $pai['PMT_WORDING']; ?>" <?= $selected; ?>><?= $pai['PMT_WORDING']; ?></option>
            <?php
            endforeach;
            ?>
        </select>
    </div>
    <div class="form-group">
        <label>Expedition</label>
        <select name="expedition" class="form-control">
            <option value=""></option>
            <?php
            foreach ($expeditions as $exp) :
                $selected = ($exp['ETY_WORDING'] == $exp_p)
                    ? 'selected'
                    : '';
            ?>
                <option value="<?= $exp['ETY_WORDING']; ?>" <?= $selected; ?>><?= $exp['ETY_WORDING']; ?></option>
            <?php
            endforeach;
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Adresse de Facturation</label>
        <select name="adrfac" class="form-control">
            <option value=""></option>
            <?php
            foreach ($adresses as $adr) :

            ?>
                <option value="<?= $adr['ADR_ID']; ?>"><?= $adr['completadress']; ?></option>
            <?php
            endforeach;
            if (isset($_SESSION['adresseFac'])) {
            ?>
                <option value="0" <?= 'selected'; ?>><?= $_SESSION['adresseFac']['completadress']; ?></option>
            <?php
            }
            ?>
        </select>
        <a class="btn btn-secondary" href="page_creation_adresse.php?type=fact">
            Créer une nouvelle adresse de facturation
        </a>

    </div>
    <div class="form-group">
        <label>Adresse de Livraison</label>
        <select name="adrliv" class="form-control">
            <option value=""></option>
            <?php
            foreach ($adresses as $adr) :

            ?>
                <option value="<?= $adr['ADR_ID']; ?>"><?= $adr['completadress']; ?></option>
            <?php
            endforeach;

            if (isset($_SESSION['adresseLiv'])) {
            ?>
                <option value="0" <?= 'selected'; ?>><?= $_SESSION['adresseLiv']['completadress']; ?></option>
            <?php
            }
            ?>
        </select>
        <a class="btn btn-secondary" href="page_creation_adresse.php?type=liv">
            Créer une nouvelle adresse de livraison
        </a>
    </div>



    <div class="form-btn-group text-right">
        <button type="submit" class="btn btn-primary">
            Enregistrer
        </button>
        <a class="btn btn-secondary" href="index.php">
            Retour
        </a>
    </div>
</form>
<?php
require __DIR__ . '/layout/bottom.php';
?>