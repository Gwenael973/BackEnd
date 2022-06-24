<?php

require_once __DIR__ .'/Include/init.php';

require __DIR__ .'/Model/UserModel.php';



$userM=new ModeleUser();


$email ='';
$errors = [];

if(!empty ($_POST)){
    sanitizePost();
    extract($_POST);
    
    if (empty($_POST['email'])){
        $errors[] = "L'email est obligatoire";
    } 
     if (empty($_POST['mdp'])){
        $errors[] = 'Le mot de passe est obligatoire';
    }
     if (empty($errors)){
        // $query = "SELECT USR_MAIL,USR_PASSWORD,USR_FIRSTNAME,USR_LASTNAME, UTY_TYPE as 'role' FROM t_d_user_usr usr
        // INNER JOIN t_d_usertype_uty uty on usr.uty_id=uty.uty_id
        // WHERE usr_mail= :email";
        // $stmt = $pdo->prepare($query);
        // $stmt->execute([':email' => $_POST['email']]);


        $utilisateur = $userM->RecupUserByMail($_POST['email'])->fetchAll();
        
        // s'il ya un utilisateur en bdd avec l'email saisi
        if (!empty($utilisateur[0])){
            
            
            if(sha1($_POST['mdp']) == $utilisateur[0]['USR_PASSWORD'])
            {
              // connecte un utilisateur, c'est l'enregistrement en session
              
              $_SESSION['utilisateur']['id']=$utilisateur[0]['USR_ID'];
              $_SESSION['utilisateur']['email']=$utilisateur[0]['USR_MAIL'];
              $_SESSION['utilisateur']['mdp']=$utilisateur[0]['USR_PASSWORD'];
              $_SESSION['utilisateur']['nom']=$utilisateur[0]['USR_LASTNAME'];
              $_SESSION['utilisateur']['prenom'] =$utilisateur[0]['USR_FIRSTNAME'];
              $_SESSION['utilisateur']['role'] =$utilisateur[0]['role'];
              header('Location: index.php');
              die;
            }
            
        }
        
        $errors[]='Identifiant ou mot de passe incorrect';
    }
}
require __DIR__ .'/layout/top.php';

if (!empty($errors)) :
?>
<div class="alert alert-danger">
    <h5 class="alert-heading">Le formulaire contient des erreurs</h5>
    <?= implode('<br>', $errors);  ?>
</div>
<?php
endif;
?>
       <h1>Connexion</h1>
       
       <form method="post">
        <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?= $email; ?>">
        </div>
        <div class="form-group">
        <label>Mot de passe</label>
        <input type="password" name="mdp" class="form-control">
        </div>  
        <div class="form-btn-group text-right">
        <button type="submit" class="btn btn-primary">Valider</button>
        </div>   
       </form>
<?php
require __DIR__ .'/layout/bottom.php';
?>
