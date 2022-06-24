<?php

class ModeleOrderDetail
{
    private $idc;
    private function connexion()
    {

        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz", 'root', '');
    }

    //Fonction pour afficher un détail de commande par rapport à l'identifiant
    public function RecupOrderDetailById($id)
    {
        $this->connexion();
        $res = $this->idc->prepare("select odt.* from t_d_orderdetails_odt odt 
                where ODT_ID= " . $id . "");
        $res->execute();
        return $res;
    }

    //Fonction pour afficher les détails de commandes par rapport à l'identifiant de commande
    public function RecupOrderDetailsByOhrId($ohrid)
    {
        $this->connexion();
        $res = $this->idc->prepare("select odt.* from t_d_orderdetails_odt odt where ohr_id= " . $ohrid . "");
        $res->execute();
        return $res;
    }



    public function InsertOrderDetail($ohrid, $prdid,
     $quantity,$expid)
    {
        $this->connexion();



        $query = 'INSERT INTO t_d_orderdetails_odt
        (OHR_ID,
        PRD_ID,
        EXP_ID,
        ODT_QUANTITY,
        ODT_ISCANCELED)
         VALUES (
            :ohrid,
            :prdid,
            :expid,
             :quantity  ,0
        )'; 

        $stmt = $this->idc->prepare($query);
        $stmt->execute([
            ':ohrid' => $ohrid,
            ':prdid' => $prdid,
            ':expid' =>$expid,
            ':quantity' => $quantity
        ]);

        // on retourne le dernier id
        return $id = $this->idc->lastInsertId();;
    }

  
}
?>
