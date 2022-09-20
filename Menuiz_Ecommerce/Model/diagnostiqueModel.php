<?php
require_once __DIR__ . '/../include/init.php';
class ModeleDiagnostique{
    
    private $idc;
    private function connexion()
    {

        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz", 'root', '');
     
    }

    //EVIDEMENT PAS FINI

    public function lireDiagnostique() {
        $this->connexion();
        $res = $this->idc->prepare("SELECT * FROM T_D_diagsav_dsa");
        $res->execute();  
        return $res;
    }

    public function InsertDiagnostique($diag)
    {
        $this->connexion();
        $query = 'INSERT INTO T_D_diagsav_dsa
        ( 
            dsa_wording
        )
         VALUES (
            :diag

        )'; 

        $stmt = $this->idc->prepare($query);
        $stmt->execute([
            ':diag' => $diag
        ]);
    }
};
?>