<?php
require_once __DIR__ . '/../include/init.php';
class ModeleDossierSAV{
    
    private $idc;
    private function connexion()
    {

        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz", 'root', '');
     
    }

    public function lireDossier() {
        $this->connexion();
        $res = $this->idc->prepare("SELECT * FROM T_D_customerservicefolder_csf");
        $res->execute();  
        return $res;
    }

    public function lireDossierViaUser($USRPrenom, $USRNom) {
        $this->connexion();
        $res = $this->idc->prepare("SELECT csf.* FROM T_D_customerservicefolder_csf csf inner join t_d_user_usr usr on csf.USR_ID WHERE usr.USR_FIRSTNAME = ? and usr.USR_LASTNAME = ?");
        $res->execute([$USRPrenom, $USRNom]);
        return $res;
    }

    public function lireDossierViaDate($date) {
        $this->connexion();
        $res = $this->idc->prepare("SELECT csf.* FROM T_D_customerservicefolder_csf csf inner join t_d_ticketSavDetail_tsd tsd on csf.TSD_ID WHERE tsd.tsd_interventiontime = ?");
        $res->execute($date);  
        return $res;
    }

    public function InsertDossier($csfStatus, $csfDescription,$usr,$prd,$oss,$ohr,$tsd)
    {
        $this->connexion();
        $query = 'INSERT INTO T_D_customerservicefolder_csf
        ( 
            CSF_STATUS,
            CSF_DESCRIPTION,
            USR_ID,
            PRD_ID,
            OSS_ID,
            OHR_ID,
            tsd_ID
        )
         VALUES (
            :csfStatus,
            :csfDescription,
            :usr,
            :prd,
            :oss,
            :ohr,
            :tsd
        )'; 

        $stmt = $this->idc->prepare($query);
        $stmt->execute([
            ':csfStatus' => $csfStatus,
            ':csfDescription' => $csfDescription,
            ':usr' => $usr,
            ':prd' => $prd,
            ':oss' => $oss,
            ':ohr' => $ohr,
            ':tsd' => $tsd
        ]);
    }

};
?>