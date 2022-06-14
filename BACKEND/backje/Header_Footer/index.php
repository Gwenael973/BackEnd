<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="CSS/style.css">
    <title>Accueil </title>
</head>
<body>   
 <?php
 // HEADER
 include "header.php";

 session_start();
if ((!isset($_SESSION['login'])) || (empty($_SESSION['login']))) 
{
// la variable 'login' de session est non déclarée ou vide
echo ' <p>Petit curieux... <a href="login.php" title"Connexion">Faut se connecter mon gars !</a></p>'."\n";
exit();
}

else{
        
        echo '<p style="color:#FF0000; font-weight:bold;">Bienvenue '.$_SESSION['login'].'.</p>';
        };
         echo '<a href="login.php">Deconnexion</a>';



 echo "<main>";

echo '<div id="contenant"> ';

 $mysqlConnection = new PDO('mysql:host=localhost;dbname=menuiz;charset=utf8', 'root', '');
 $produitStatement = $mysqlConnection->prepare('SELECT * FROM T_D_PRODUCT_PRD');

 $produitStatement->execute();
 $produits = $produitStatement->fetchAll();

 // On affiche chaque produit un à un



 foreach ($produits as $produit) {
 ?>
<div id="card_produit">
        <?php  echo '<div id="produit' .$produit['PRD_ID']. '">'?>
         <p><?php echo $produit['PRD_DESCRIPTION']; ?></p>
         
     
         <?php
         echo ' <img src=" ' . $produit['PRD_PICTURE'] .'" > ';
         echo  'Prix: '. $produit['PRD_PRICE'].'€';
         echo '<button class="btn btn-primary" type="submit">Button</button>';
       
         ?>
         </div>
 </div>



<?php

 } ?>
 <?php  echo '</div>'; ?>
 

 <?php
 echo "</main>";
    // FOOTER
     include "footer.php";
?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>