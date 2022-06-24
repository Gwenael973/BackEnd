<?php
/*
Faire le formulaire d'édition de produit
- nom : champ text - obligatoire
- description : champ textarea - obligatoire
- prix : champ text - obligatoire
- catégorie : liste déroulante - obligatoire
Si le formulaire est correctement rempli : INSERT en bdd
et redirection vers la page de liste avec message de confirmation
sinon messages d'erreurs et champs pré-remplis avec les valeurs saisies

Adapter la page pour la modification
- si on reçoit un id dans l'URL sans retour de POST, pré-remplissage
du formulaire à partir de la bdd
- enregistrement avec UPDATE au lieu d'INSERT
- adapter le contrôle de l'unicité de la référence pour exclure
la référence du produit que l'on modifie de la requête
*/
require_once __DIR__ . '/../include/init.php';
adminSecurity();

 $code=$description = $prix = $categorie = $photoActuelle = '';

if (!empty($_POST)) {
    
    
    sanitizePost();
    extract($_POST);
    
    if (empty($_POST['code'])) {
        $errors[] = 'Le code produit est obligatoire';
    }
    
    if (empty($_POST['description'])) {
        $errors[] = 'La description est obligatoire';
    }
    
    
        $query = 'SELECT count(*) FROM t_d_product_prd  ';
        
        if (!empty($_GET['id'])) {
            $query .= ' WHERE PRD_ID !=' . (int)$_GET['id'];
        }
        
        $stmt = $pdo->prepare($query);
       
        $stmt->execute();
        $nb = $stmt->fetchColumn();
        
        if ($nb != 0) {
            $errors[] = 'Il existe déjà un produit avec cette référence';
        }
   
    
    if (empty($_POST['prix'])) {
        $errors[] = 'Le prix est obligatoire';
    }
    
    if (empty($_POST['categorie'])) {
        $errors[] = 'La catégorie est obligatoire';
    }
    
    //si une image a été telechargé
    if (!empty($_FILES['photo']['tmp_name'])) {
        //if($_FILES['photo']['size'] > 1000000) : le poids fichier en octes
        if($_FILES['photo']['size'] > 1000000){
            $errors[] = 'La photo ne doit pas faire plus de 1Mo';
        }
        
        $allowedMimeTypes = [
            'image/jpeg',
            'image/gif',
            'image/png',
            
        ];
        
        if(!in_array($_FILES['photo']['type'] ,$allowedMimeTypes)){
            $errors[] = 'La photo doit être une image GIF, JPG ou PNG';
        }
    }
    
    
    if (empty($errors)) {
        if(!empty($_FILES['photo']['tmp_name'])) {
            $name = $_FILES['photo']['name'];
            // on retrouve l'extension du fichier original à partir de son nom
            $extension = substr($name,strrpos($name,'.'));
            // le nom que va avoir le fichier dans le répertoire photo
            $nomPhoto = $_POST['reference'] . $extension;
            
            // en modification, si le produit avait deja une photo
            // on la supprimme
            if(!empty($photoActuelle)){
                unlink(PHOTO_DIR . $photoActuelle);
            }
            
            // enregistrement de fichier dans le repertoire photo
            move_uploaded_file($_FILES['photo']['tmp_name'], PHOTO_DIR . $nomPhoto);
        } else {
            $nomPhoto = $photoActuelle;
        }
    }
    
    
    
    if (empty($errors)) {
        if (!empty($_GET['id'])) {
            $query = '
                UPDATE T_D_PRODUCT_PRD SET
                PRD_DESCRIPTION = :description,
                PRD_PRICE = '.$_POST['prix'].',
                    PTY_ID = '.$_GET['categorie'].', 
                    PRD_PICTURE = :photo     ,  PRD_CODE  :code      
                WHERE id = '.$_GET['id'].'';
            $stmt = $pdo->prepare($query);
            $stmt->execute([
              
                ':description' => $_POST['description'],
                ':photo' => $nomPhoto
            ]);
        } else {
            $query = '
INSERT INTO produit (
    PRD_DESCRIPTION ,
   PRD_PRICE ,
    PTY_ID , 
    PRD_PICTURE,PRD_CODE
) VALUES (
    
    :description,
    '.$_POST['prix'].',
    '.$_POST['categorie'].',
    :photo,:code
)
';
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ':description' => $_POST['description'],
                
                ':photo' => $nomPhoto,
                ':code'  => $_POST['code']
            ]);

            $lastInsertId = $stmt->lastInsertId();
            echo $lastInsertId;
        }
         
        setFlashMessage('Le produit est enregistré');
        header('Location: produits.php');
        die;
   }
} elseif (!empty($_GET['id'])) {
    $query = 'SELECT * FROM T_D_PRODUCT_PRD WHERE PRD_ID = ' . (int)$_GET['id'];
    $stmt = $pdo->query($query);
    $produit = $stmt->fetch();
    extract($produit);
    $categorie_p = $produit['PTY_ID'];
    $photoActuelle= $produit['PRD_PICTURE'];
   
}

// pour construire le SELECT des catégories - on exclue le type kit car on veut que ce ne soit qu'un process bien défini qui créé les KITS
$query = "SELECT * FROM T_D_PRODUCTTYPE_PTY where PTY_DESCRIPTION !='KIT' ORDER BY PTY_DESCRIPTION";
$stmt = $pdo->query($query);
$categorie = $stmt->fetchAll();

require __DIR__ . '/../layout/top.php';

if (!empty($errors)) :
?>
    <div class="alert alert-danger">
        <h5 class="alert-heading">Le formulaire contient des erreurs</h5>
        <?= implode('<br>', $errors); // transforme un tableau en chaîne de caractères ?>
    </div>
<?php
endif;
?>
<h1>Edition produit</h1>
<!-- L'attribut enctype est obligatoire pour unn formulaire qui contient un telechargement de fichier
-->
<form method="post" class="inscrip_form" enctype="multipart/form-data">
<div class="form-group">
        <label>Code</label>
        <textarea name="description"
            class="form-control"><?= $code; ?></textarea>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description"
            class="form-control"><?= $description; ?></textarea>
    </div>
  
    <div class="form-group">
        <label>Prix</label>
        <input type="text" name="prix"
            class="form-control" value="<?= $prix; ?>">
    </div>
    <div class="form-group">
        <label>Catégorie</label>
        <select name="categorie" class="form-control">
            <option value=""></option>
            <?php
            foreach ($categorie as $cat) :
                $selected = ($cat['PTY_ID'] == $categorie_p)
                    ? 'selected'
                    : ''
                ;
            ?>
                <option value="<?= $cat['PTY_DESCRIPTION']; ?>" <?= $selected; ?>><?= $cat['PTY_DESCRIPTION']; ?></option>
            <?php
            endforeach;
            ?>
        </select>
    </div>
     <div class="form-group" style="margin-top:30px;">
        <label>Photo</label></br>
        <input type="file" name="photo">
    </div>
    <?php
    if(!empty($photoActuelle)):
        echo '<p class="img_produit"><img src="'. $photoActuelle. '" height ="150px"></p>';
    endif;
    ?>
    <input type="hidden" name="photoActuelle" value="<?= $photoActuelle; ?>">
    <div class="form-btn-group text-right">
        <button type="submit" class="btn btn-primary">
            Enregistrer
        </button>
        <a class="btn btn-secondary" href="produits.php">
            Retour
        </a>
    </div>
</form>
<?php
require __DIR__ . '/../layout/bottom.php';
?>