<?php
// require __DIR__ . '/PaymentTypeModel.php';
// require __DIR__ . '/ExpeditionTypeModel.php';
// require __DIR__ . '/AddressModel.php';
// require __DIR__ . '/ProduitModel.php';
// require __DIR__ . '/OrderDetailModel.php';

class ModeleOrderHeader
{
    private $idc;
    private function connexion()
    {

        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz", 'root', '');
    }

    //Fonction pour afficher une commande par rapport à l'identifiant
    public function RecupOrderHeaderById($id)
    {
        $this->connexion();
        $res = $this->idc->prepare("select ohr.* from t_d_orderheader_ohr ohr 
                where OHR_ID= " . $id . "");
        $res->execute();
        return $res;
    }

    //Fonction pour afficher les commandes d'un utilisateur
    public function RecupOrderHeadersByOhrId($usrid)
    {
        $this->connexion();
        $res = $this->idc->prepare("select ohr.* from t_d_orderheader_ohr ohr 
        where usr_id= " . $usrid . "");
        $res->execute();
        return $res;
    }



    public function InsertOrderHeader($adridliv, $adridfac, $pmtid, $etyid, $usrid)
    {

        $this->connexion();
        $query = 'INSERT INTO t_d_orderheader_ohr
       (
       ADR_ID_LIV,
       ADR_ID_FAC,
       PMT_ID,
       OSS_ID,
       ETY_ID,
       USR_ID,
       OHR_DATE)
       VALUES
       (  
            :adridliv,
            :adridfac,
            :pmtid  ,1,
            :etyid,
            :usrid,now()
        )';

        $stmt = $this->idc->prepare($query);
        $stmt->execute([
            ':adridliv' => $adridliv,
            ':adridfac' => $adridfac,
            ':pmtid' => $pmtid,
            ':etyid' => $etyid,
            ':usrid' => $usrid
        ]);

        $id = $this->idc->lastInsertId();

        // on met à jour l'ordernumber
        $query = 'update t_d_orderheader_ohr set OHR_NUMBER=:ordernumber where OHR_ID=:orderid';
        $stmt = $this->idc->prepare($query);
        $stmt->execute([
            ':ordernumber' => 'ORDER' . $id,
            ':orderid' => $id
        ]);

        // on retourne le dernier id
        return $id;
    }

    public function DeleteOrder($idOrderHeader, $adridliv, $adridfac, $bcreateAdrLiv, $bcreateAdrFac,$expid)
    {
        try {

            $this->connexion();

            if ($bcreateAdrFac) {
                $query = 'delete from T_D_ADDRESS_ADR where ADR_ID=:adridfac';

                $stmt = $this->idc->prepare($query);
                $stmt->execute([
                    ':adridfac' => $adridfac
                ]);
            }
            if ($bcreateAdrLiv) {
                $query = 'delete from T_D_ADDRESS_ADR where ADR_ID=:adridliv';

                $stmt = $this->idc->prepare($query);
                $stmt->execute([
                    ':adridliv' => $adridliv
                ]);
            }

            $query = 'delete from T_D_EXPEDITION_EXP where EXP_ID=:expid';

            $stmt = $this->idc->prepare($query);
            $stmt->execute([
                ':expid' => $expid
            ]);


            $query = 'delete from T_D_ORDERDETAILS_ODT where OHR_ID=:ohrid';

            $stmt = $this->idc->prepare($query);
            $stmt->execute([
                ':ohrid' => $idOrderHeader
            ]);

            $query = 'delete from T_D_ORDERHEADER_OHR where OHR_ID=:ohrid';

            $stmt = $this->idc->prepare($query);
            $stmt->execute([
                ':ohrid' => $idOrderHeader
            ]);
        } catch (Exception $e) {
            //il est possible que lors de l'insertion originale, tout ne se soit pas créé
        }
    }
}
