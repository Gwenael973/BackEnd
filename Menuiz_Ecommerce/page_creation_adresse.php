<?php
require_once __DIR__ . '/Include/init.php';

require __DIR__ . '/Model/AddressModel.php';

$type = $_GET['type'];

if (isset($_POST['submit'])) {
    sanitizePost();
    extract($_POST);


    //on vérifie que tous les champs obligatoires sont renseignés (prénom, nom, mail, téléphone, adresse1, cp, ville, pays)
    if (empty($_POST['prenom'])) {
        $errors[] = 'Le prenom est obligatoire';
    }
    if (empty($_POST['nom'])) {
        $errors[] = 'Le nom est obligatoire';
    }
    if (empty($_POST['adresse1'])) {
        $errors[] = 'La première ligne d adresse est obligatoire';
    }
    if (empty($_POST['code_postal'])) {
        $errors[] = 'Le code postal est obligatoire';
    }
    if (empty($_POST['ville'])) {
        $errors[] = 'La ville est obligatoire';
    }
    if (empty($_POST['pays'])) {
        $errors[] = 'Le pays est obligatoire';
    }
    if (empty($_POST['phone'])) {
        $errors[] = 'Le numéro de téléphone est obligatoire';
    }

    //il n'y a pas d'erreur on continue
    if (empty($errors)) {
        //on vérifie que l'adresse saisie n'a pas déjà été enregistré en BDD pour le user en question

        $adresse = new ModeleAddress();
        $adresses = $adresse->VerifAddressByUser(
            $_SESSION['utilisateur']['id'],
            $_POST['prenom'] . ' ' . $_POST['nom']  . "\n" .
                $_POST['adresse1'] . "\n" . $_POST['adresse2'] . "\n" .
                $_POST['adresse3'] . "\n" .
                $_POST['code_postal'] . ' ' . $_POST['ville'] . "\n"
                . $_POST['pays']
        )->fetchAll();

        if (count($adresses) > 0) {
            $errors[] = 'Cette adresse est déjà configurée pour votre compte.';
        } else {
            if ($type == 'liv') {
               
                $_SESSION['adresseLiv']['completadress']= $_POST['prenom'] . ' ' . $_POST['nom']  . "\n" .
                $_POST['adresse1'] . "\n" . $_POST['adresse2'] . "\n" .
                $_POST['adresse3'] . "\n" .
                $_POST['code_postal'] . ' ' . $_POST['ville'] . "\n"
                . $_POST['pays'];


                $_SESSION['adresseLiv']['prenom']=$_POST['prenom'];
                $_SESSION['adresseLiv']['nom']=$_POST['nom'];
                $_SESSION['adresseLiv']['adresse1']=$_POST['adresse1']; 
                $_SESSION['adresseLiv']['adresse2']= $_POST['adresse2']; 
                $_SESSION['adresseLiv']['adresse3']=$_POST['adresse3'] ;
                $_SESSION['adresseLiv']['code_postal']=$_POST['code_postal']; 
                $_SESSION['adresseLiv']['ville']= $_POST['ville'] ;
                $_SESSION['adresseLiv']['pays']= $_POST['pays'];
                $_SESSION['adresseLiv']['mail']= $_POST['mail'];
                $_SESSION['adresseLiv']['phone']= $_POST['phone'];

                header('Location: page_creation_commande.php');
                die;
            } else if ($type == 'fact') {
                $_SESSION['adresseFac']['completadress']= $_POST['prenom'] . ' ' . $_POST['nom']  . "\n" .
                $_POST['adresse1'] . "\n" . $_POST['adresse2'] . "\n" .
                $_POST['adresse3'] . "\n" .
                $_POST['code_postal'] . ' ' . $_POST['ville'] . "\n"
                . $_POST['pays'];

                $_SESSION['adresseFac']['prenom']=$_POST['prenom'];
                $_SESSION['adresseFac']['nom']=$_POST['nom'];
                $_SESSION['adresseFac']['adresse1']=$_POST['adresse1']; 
                $_SESSION['adresseFac']['adresse2']= $_POST['adresse2']; 
                $_SESSION['adresseFac']['adresse3']=$_POST['adresse3'] ;
                $_SESSION['adresseFac']['code_postal']=$_POST['code_postal']; 
                $_SESSION['adresseFac']['ville']= $_POST['ville'] ;
                $_SESSION['adresseFac']['pays']= $_POST['pays'];
                $_SESSION['adresseFac']['mail']= $_POST['mail'];
                $_SESSION['adresseFac']['phone']= $_POST['phone'];



                header('Location: page_creation_commande.php');
                die;
            }
            
        }
    }
}
require __DIR__ . '/layout/top.php';

if (!empty($errors)) :
?>
    <div class="alert alert-danger">
        <h5 class="alert-heading">Le formulaire contient des erreurs</h5>
        <?= implode('<br>', $errors); // transforme un tableau en chaîne de caractères 
        ?>
    </div>
<?php
endif;
?>
<FORM method="POST">

    <h1> Formulaire d'enregistrement d'adresse </h1>


    <div id="color">
        <p>Votre prénom:</p>
        <input type="text" id="prenom" name="prenom" /><br />
        <br />

        <p>Votre nom : </p>

        <input type="text" id="nom" name="nom" /><br />
        <br />
        <p>Adresse mail :</p>
        <INPUT type="mail" name="mail" /><br />
        <br />
        <p>Adresse : <br /></p>
        <input type="text" id="adresse1" name="adresse1" /><br />

        <input type="text" id="adresse2" name="adresse2" /><br />

        <input type="text" id="adresse3" name="adresse3" /><br />
        <br />
        <p>Code postal : </p>
        <input type="text" id="code_postal" name="code_postal" /><br />
        <br />
        <p>Ville :</p>
        <input type="text" id="ville" name="ville" /><br />
        <br />
        <p>Pays : </p>
        <input type="text" id="pays" name="pays" /><br />
        <br />
        <p>Numéro de téléphone : </p>
        <input type="text" id="phone" name="phone" /><br />
        <br />
    </div>

    <p>
        <input type="submit" value="Envoyer" name="submit" />
    </p>
</FORM>

<?php
require __DIR__ . '/layout/bottom.php';
?>