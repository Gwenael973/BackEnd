<?php
 
@$nom = $_POST["nom"];
@$prenom = $_POST["prenom"];
@$pseudo = $_POST["pseudo"];
@$password = $_POST["password"];
@$passwordConf = $_POST["passconf"];
@$pass_crypt = sha1($_POST["password"]);
@$email = $_POST["email"];
?>