<?php
 
session_start();
include("infos.php");
@$valider = $_POST["valider"];
$erreur = "";
if (isset($valider)) {
include("connexion.php");
$verify = $pdo->prepare("select * from t_d_user_usr where USR_MAIL=? and USR_PASSWORD=? limit 1");
$verify->execute(array($pseudo, $pass_crypt));
$user = $verify->fetchAll();
if (count($user) > 0) {
$_SESSION["prenom_nom"] = $pseudo;
// ucfirst(strtolower($user[0]["prenom"])) .
// " "  .  strtoupper($user[0]["nom"]);
$_SESSION["connecter"] = "yes";
header("location:session.php");
} else
$erreur = "Mauvais login ou mot de passe!";
}
?>
 
<!DOCTYPE  html>
<html>
<head>
<meta  charset="utf-8"  />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="/Menuiz-Man/css/style.css">
</head>




<div  class="erreur"><?php  echo  $erreur  ?></div>

<body  onLoad="document.fo.login.focus()" class="bg-dark">
          <header >
          <img  style="-webkit-box-shadow: 5px 5px 15px 5px #FFFFFF; 
box-shadow: 5px 5px 15px 5px #FFFFFF;"   class="logo footLogo" src="img\MenuizMan_logo.png" alt="logo">

          </header>
           <br />  
           <div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
                <h3 align="" class="text-white">Connexion</h3><br />  
                <form  name="form"  method="post"  action="" class="text-white">  
                     <label>E-Mail</label>  
                     <input  type="text"  name="pseudo"    class="form-control" />  
                     <br />  
                     <label>Mot de Passe</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit"  name="valider"  value="S'authentifier"class="btn btn-outline-danger" />  
                </form>  
                <div class="d-flex align-items-center mb-0 me-2  text-white">
                    <p class="mb-0 me-2">Pas de compte?</p> 
                    <button type="button" class="btn btn-outline-danger" onclick="window.location='inscription.php';" >S'inscrire</button>
                    
                  </div>
           </div>  
           <br />  
           <?php include "footer.php";  ?>
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
      </body>  
 </html>  