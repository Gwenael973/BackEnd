<?php
require_once __DIR__ . '/include/init.php';

$query = 'SELECT P.* FROM T_D_PRODUCT_PRD P WHERE PRD_ID = ' . (int)$_GET['id'];
$stmt = $pdo->query($query);
$produit = $stmt->fetch();

$src = (!empty($produit['PRD_PICTURE']))
    ? PHOTO_WEB . $produit['PRD_PICTURE']
    : PHOTO_DEFAULT
;

if(!empty($_POST)){
    ajouterPanier($produit, $_POST['quantite']);
    //dump($_SESSION['panier']);
    setFlashMessage('Le produit est ajoute au panier');
    //rediriger vers la page sur llaquelle on se trouve
    //permet de ne pas renvoyer les informations de formulaire a l'actualisation de la page
    //header('Location:produit-single.php?id='.$_GET['id']);
}


require __DIR__ . '/layout/top.php';
?>
<h1><?= $produit['PRD_DESCRIPTION']; ?></h1>

<div class="row">
    <div class="col-md-4 text-center">
        <img height="200px" src="<?= $src; ?>">
        <p><?= prixFr($produit['PRD_PRICE']); ?></p>
        <form method="post" class="form-inline">
            <label>Qté</label>
            <select name="quantite" class="form-control">
                <?php
                for ($i = 1; $i <= 10; $i++) :
                ?>
                <option value="<?= $i; ?>"><?= $i; ?></option>
                <?php
                endfor;
                ?>
            </select>
            <button type="submit" class="btn btn-primary">
                Ajouter au panier
            </button>
        </form>
    </div>
    <div class="col-md-8">
        <?= $produit['PRD_DESCRIPTION']; ?>
    </div>
</div>

<?php
require __DIR__ . '/layout/bottom.php';
?>