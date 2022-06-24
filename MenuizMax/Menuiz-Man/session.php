<?php
 
 
    session_start();
 
if ($_SESSION["connecter"] != "yes") {
header("location:login.php");
exit();
}
if (date("H") < 18)
$bienvenue = "Bonjour et bienvenue "  .
$_SESSION["prenom_nom"];
else
$bienvenue = "Bonsoir et bienvenue "  .
$_SESSION["prenom_nom"];
?>
 
<!DOCTYPE  html>
<html>
<head>
<meta  charset="utf-8"  />
<title>Accueil</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="/Menuiz-Man/css/style.css">

</head>
<body >
<?php include "header.php";?>

<div class="panier"><?php include"panier.php";?></div>

<?php

 $mysqlConnection = new PDO('mysql:host=localhost;dbname=menuiz;charset=utf8', 'root', '');
 $produitStatement = $mysqlConnection->prepare('SELECT * FROM T_D_PRODUCT_PRD');

 $produitStatement->execute();
 $produits = $produitStatement->fetchAll();

 include"produits.php";


    include"footer.php"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>

