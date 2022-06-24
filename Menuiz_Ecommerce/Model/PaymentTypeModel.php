<?php

class ModelePaymentType
{
    private $idc;
    private function connexion()
    {

        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz", 'root', '');
    }

    //Fonction pour afficher un type de paiment par rapport à son identifiant
    public function RecupPaymentType($id)
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT PMT.*  FROM T_D_PAYMENTTYPE_PMT PMT
 where PMT_ID= " . $id . "");
        $res->execute();
        return $res;
    }

    //Fonction pour afficher un type de paiment par rapport à son libellé
    public function RecupPaymentTypeByLib($type)
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT PMT.*  FROM T_D_PAYMENTTYPE_PMT PMT
     where PMT_WORDING= '" . $type . "'");
        $res->execute();
        return $res;
    }



    //Fonction pour recup tous les types de paiement
    public function RecupPaymentTypeAll()
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT PMT.*  FROM T_D_PAYMENTTYPE_PMT PMT");
        $res->execute();
     
        return $res;
    }


  
}
?>
