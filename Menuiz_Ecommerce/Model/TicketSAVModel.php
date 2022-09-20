<?php
require_once __DIR__ . '/../include/init.php';
class ModeleTicketDetail{
    
    private $idc;
    private function connexion()
    {

        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz", 'root', '');
     
    }

    public function lireTicket() {
        $this->connexion();
        $res = $this->idc->prepare("SELECT * FROM T_D_ticketSavDetail_tsd");
        $res->execute();  
        return $res;
    }

    public function InsertTicket($tsdIP, $tsdDescription, $thi, $prd, $usr)
    {
        $this->connexion();
        $query = 'INSERT INTO T_D_ticketSavDetail_tsd
        ( 
            tsd_IP,
            tsd_DESCRIPTION,
            thi_id,
            prd_id,
            usr_id
        )
         VALUES (
            :tsdIp,
            :tsdDescription,
            :thi,
            :prd,
            :usr
        )'; 

        $stmt = $this->idc->prepare($query);
        $stmt->execute([
            ':tsdIp' => $tsdIP,
            ':tsdDescription' => $tsdDescription,
            ':thi' => $thi,
            ':prd' => $prd,
            ':usr' => $usr
        ]);
    }

};
?>
