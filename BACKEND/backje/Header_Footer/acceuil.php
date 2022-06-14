
<!DOCTYPE html>
<html lang="fr">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" description="menuiserie intranet">
        <!-- <link rel="stylesheet" href="CSS/style.css"> -->
        <title>Accueil </title>
</head>

<body>

<?php session_start();
if ((!isset($_SESSION['login'])) || (empty($_SESSION['login']))) 
{
// la variable 'login' de session est non déclarée ou vide
echo ' <p>Petit curieux... <a href="login.php" title"Connexion">Faut se connecter mon gars !</a></p>'."\n";
exit();
}

else{
        
        echo '<p style="color:#FF0000; font-weight:bold;">Bienvenue '.$_SESSION['login'].'.</p>';
        };?>




</body>

<footer>
       
        <p class="mention">Mentions légales</p>
        <p class="copy">Copyright ©</p>
        <p class="mail">Mail : support@exemple.com</p>
</footer>

</html>