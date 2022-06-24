<?php  
 session_start();  
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "menuiz";  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $message = '<label>Tous les champs doivent être remplis</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM t_d_user_usr WHERE USR_MAIL = :username AND USR_PASSWORD = sha1(:password)"; 
                
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     $_POST["password"]  ,
                       
                     )  
                );  
                echo  $query ;
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["name"] = $_POST["username"];  
                     header("location:index.php");  
                }  
                else  
                {  
                     $message = '<label>Mauvaise information</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  

 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Produit Breton</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
           
      </head>  
      <body class ="bg-dark">  
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
                <form method="post" class="text-white">  
                     <label>E-Mail</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Mot de Passe</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" class="btn btn-outline-danger" value="se connecter" />  
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