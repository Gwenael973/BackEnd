<?php

class ModeleExpeditionType
{
    private $idc;
    private function connexion()
    {

        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz", 'root', '');
    }

    //Fonction pour afficher un type de Expedition par rapport à son identifiant
    public function RecupExpeditionType($id)
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT ETY.*  FROM T_D_EXPEDITIONTYPE_ETY ETY
 where ETY_ID= " . $id . "");
        $res->execute();
        return $res;
    }

    //Fonction pour afficher un type de Expedition par rapport à son libellé
    public function RecupExpeditionTypeByLib($type)
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT ETY.*  FROM T_D_EXPEDITIONTYPE_ETY ETY
     where ETY_WORDING= '" . $type . "'");
        $res->execute();
        return $res;
    }



    //Fonction pour recup tous les types de Expedition
    public function RecupExpeditionTypeAll()
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT  ETY.*  FROM T_D_EXPEDITIONTYPE_ETY ETY");
        $res->execute();
     
        return $res;
    }


  
}
?>
