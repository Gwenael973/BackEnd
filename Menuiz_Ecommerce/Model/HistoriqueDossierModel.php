<?php
require_once __DIR__ . '/../include/init.php';
class ModeleHistoriqueDossier{
    
    private $idc;
    private function connexion()
    {

        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz", 'root', '');
     
    }

    public function lireHistorique() {
        $this->connexion();
        $res = $this->idc->prepare("SELECT * FROM T_D_tickethistory_thi");
        $res->execute();  
        return $res;
    }

    public function InsertHistorique($interventiontime,$tsd)
    {
        $this->connexion();
        $query = 'INSERT INTO T_D_tickethistory_thi
        ( 
            thi_interventiontime
        )
         VALUES (
            :interventiontime
        )'; 

        $stmt = $this->idc->prepare($query);
        $stmt->execute([
            ':interventiontime' => $interventiontime,
        ]);
    }



};
?>