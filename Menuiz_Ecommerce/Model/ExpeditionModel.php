<?php

class ModeleExpedition
{
    private $idc;
    private function connexion()
    {

        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz", 'root', '');
    }

    //Fonction pour afficher une expedition par rapport à l'identifiant
    public function RecupExpeditionById($id)
    {
        $this->connexion();
        $res = $this->idc->prepare("select exp.* from t_d_expedition_exp exp 
                where EXP_ID= " . $id . "");
        $res->execute();
        return $res;
    }

   



    public function InsertExpedition()
    {
        $this->connexion();



        $query = 'INSERT INTO t_d_expedition_exp
        (EXP_WEIGTH,
EXP_TRACKINGNUMBER)
         VALUES (
            0,""
        )'; 

        $stmt = $this->idc->prepare($query);
        $stmt->execute();

        // on retourne le dernier id
        return $id = $this->idc->lastInsertId();;
    }

  
}
