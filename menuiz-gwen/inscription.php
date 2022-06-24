<?php
   
    $servername = "localhost"; 
    $username = "root"; 
    $password = "";
   
    $database = "menuiz";
   
     // Create a connection 
     $conn = mysqli_connect($servername, 
         $username, $password, $database);
   
    // Code written below is a step taken
    // to check that our Database is 
    // connected properly or not. If our 
    // Database is properly connected we
    // can remove this part from the code 
    // or we can simply make it a comment 
    // for future reference.
   








    
$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
      
    
    $username = $_POST["username"]; 
    $password = $_POST["password"]; 
    $cpassword = $_POST["cpassword"];
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
            
    
    $sql = "Select * from t_d_user_usr where USR_MAIL='$username'";
    
    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result); 
    
    // This sql query is use to check if
    // the username is already present 
    // or not in our Database
    if($num == 0) {
        if(($password == $cpassword) && $exists==false) {
    
            $hash = sha1($password
                                );
                
            // Password Hashing is used here. 
            $sql = "INSERT INTO `t_d_user_usr` ( `USR_MAIL`, 
                `USR_PASSWORD`, `USR_FIRSTNAME`, `USR_LASTNAME`) VALUES ('$username', 
                '$hash', '$prenom','$nom')";
    
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                $showAlert = true; 
            }
        } 
        else { 
            $showError = "Passwords do not match"; 
        }      
    }// end if 
    
   if($num>0) 
   {
      $exists="Email deja inscrit"; 
   } 
    
}//end if   
    
?>


<?php
    
    if($showAlert==true) {
    
        echo ' <div class="alert alert-success 
            alert-dismissible fade show" role="alert">
    
            <strong>Success!</strong> Your account is 
            now created and you can login. 
           
        </div> '; 
    }
    
    if($showError==true) {
    
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert"> 
        <strong>Error!</strong> '. $showError.'
    
       <button type="button" class="close" 
            data-dismiss="alert aria-label="Close">
            <span aria-hidden="true">×</span> 
       </button> 
     </div> '; 
   }
        
    if($exists==true) {
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert">
    
        <strong>Error!</strong> '. $exists.'
        <button type="button" class="close" 
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button>
       </div> '; 
     }
   
?>







<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Inscription</title>
</head>
<body  >
  <header class="bg-dark">
  <button type="submit" class="btn btn-outline-danger mt-4 " onclick="window.location='login.php';">
              Retour 
            </button>
  </header>






   <form action="inscription.php" method="post">
<section class=" bg-dark">
  <div class="container  h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration ">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Inscription</h3>

                

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="prenom" name="prenom" class="form-control form-control-lg"  required/>
                      <label class="form-label" for="prenom" >Prenom</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    
                      <input type="text" name="nom"id="nom" class="form-control form-control-lg"  required/>
                      <label class="form-label" for="nom">Nom</label>
                    </div>
                  </div>



               
        
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example8" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example8">Adresse(falcultatif)</label>
                </div>

                <div class="row">
                  
                  <div class="col-md-6 mb-4">

                    <select class="select"  required>
                      <option value="1">Pays</option>
                      <option value="2">France</option>
                     
                    </select>

                  </div>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example9" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example9">Ville(falcultatif)</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example90" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example90">code postal(falcultatif)</label>
                </div>

                <div class="form-outline mb-4">
                 
                  <label class="form-label" for="username">E-mail</label>
                   <input type="email" name="username"  id="username" aria-describedby="emailHelp" class="form-control form-control-lg"  required/>
                </div>
                <div class="form-outline mb-4 ">
                  
                  <label class="form-label" for="password">Mot de passe</label>
                  <input name="password" type="password" id="password" class="form-control form-control-lg"  required/>
                </div>

                <div class="form-group"> 
            <label for="cpassword">Confirmer le mot de passe</label> 
            <input type="password" class="form-control" id="cpassword" name="cpassword" >
               
                 <small id="emailHelp" class="form-text text-muted">
                  Soyez sur d'avoir bien écrit le meme mot de passe
                    </small>  
        </div>  

                <div class="d-flex justify-content-end pt-3">
                  <button type="reset" class="btn btn-dark btn-lg" value="Reset" >Effacer</button>
                  <button type="submit" class="btn btn-dark btn-lg ms-2">Envoyer</button>
                </div>
                
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
<?php
    include "footer.php"; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>