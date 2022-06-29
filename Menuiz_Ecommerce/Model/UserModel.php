<?php

class ModeleUser
{
    private $idc;
    private function connexion()
    {

        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz", 'root', '');
    }

    //Fonction pour afficher un user par rapport à son identifiant
    public function RecupUser($id)
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT USR.*,UTY_TYPE FROM T_D_USER_USR USR inner join T_D_USERTYPE_UTY UTY
on USR.UTY_ID=UTY.UTY_ID
 where USR_ID= " . $id . "");
        $res->execute();
        return $res;
    }

    //Fonction pour afficher un user par rapport à son mail
    public function RecupUserByMail($mail)
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT USR.*,UTY_TYPE  as 'role'  FROM T_D_USER_USR USR inner join T_D_USERTYPE_UTY UTY
    on USR.UTY_ID=UTY.UTY_ID
     where USR_MAIL= '" . $mail . "'");
        $res->execute();
        return $res;
    }



    //Fonction pour recup le nombre d'utilisateurs pour un mail
    public function RecupCountUsers($mail)
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT count(*) FROM T_D_USER_USR 
     where USR_MAIL= '" . $mail . "'");
        $res->execute();
        $nb = $res->fetchColumn();
        return $nb;
    }


    public function InsertUser($nom, $prenom, $email, $mdp)
    {
        $this->connexion();
        $query = 'INSERT INTO T_D_USER_USR
        ( USR_MAIL,
        USR_PASSWORD,
        USR_FIRSTNAME,
        USR_LASTNAME,UTY_ID)
         VALUES (
            :email,
            :mdp,
            :nom,
            :prenom  ,1
        )'; //par défaut on le met en type utilisateur visiteur

        $stmt = $this->idc->prepare($query);
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            // enregistrement du mot de passe a l'enregistrement
            ':mdp' => sha1($mdp)
        ]);

        // on retourne le dernier id
        return $id = $this->idc->lastInsertId();;
    }
    public function InsertUserDroit($nom, $prenom, $email, $mdp,$droit)
    {
        $this->connexion();
        $query = 'INSERT INTO T_D_USER_USR
        ( USR_MAIL,
        USR_PASSWORD,
        USR_FIRSTNAME,
        USR_LASTNAME,UTY_ID)
         VALUES (
            :email,
            :mdp,
            :nom,
            :prenom,
            :droit
        )'; //par défaut on le met en type utilisateur visiteur

        $stmt = $this->idc->prepare($query);
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            // enregistrement du mot de passe a l'enregistrement
            ':mdp' => sha1($mdp),
            ':droit'=>$droit
        ]);

        // on retourne le dernier id
        return $id = $this->idc->lastInsertId();;
    }





  
}
?>