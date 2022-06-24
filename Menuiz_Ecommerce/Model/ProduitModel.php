<?php

class ModeleProduct {
private $idc;
private function connexion() {

 $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz", 'root', '');

}

//Fonction pour afficher tous les produits
public function lireProduits() {
$this->connexion();
$res = $this->idc->prepare("SELECT * FROM T_D_Product_PRD");
$res->execute();  
return $res;
}

//Fonction pour afficher les produits basés sur une recherche
public function RechercheProduits($recherche) {
$this->connexion();
$res = $this->idc->prepare("SELECT * FROM T_D_Product_PRD where PRD_DESCRIPTION like '%".$recherche."%'");
$res->execute();  
return $res;
}

//Fonction pour afficher un produit par rapport à son identifiant
public function RecupProduit($id) {
$this->connexion();
$res = $this->idc->prepare("SELECT PRD.*,PTY_DESCRIPTION FROM T_D_Product_PRD PRD inner join T_D_PRODUCTTYPE_PTY PTY
on PRD.PTY_ID=PTY.PTY_ID
 where PRD_ID= ".$id."");
$res->execute();  
return $res;
}



}


?>
