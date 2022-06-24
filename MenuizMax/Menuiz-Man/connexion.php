<?php
   try{
      $pdo=new PDO("mysql:host=localhost;dbname=menuiz","root","");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>