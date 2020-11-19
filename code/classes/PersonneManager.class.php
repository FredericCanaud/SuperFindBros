<?php
class PersonneManager {

    ////////////////// Constructeur ////////////////

    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    ////////////////////////////////////////////////
    //
    // Fonction qui retourne tous les personnes de la BD
    //
    ////////////////////////////////////////////////

    public function getAllPersonnes() {
        $listePersonnes = array();
        $sql = 'SELECT per_num, per_nom, per_prenom, per_age, per_mail, per_pseudo, per_mdp FROM personne';
        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($personne = $requete->fetch(PDO::FETCH_OBJ)){
            $listePersonnes[] = new Personne($personne);
        }
        $requete->closeCursor();
        return $listePersonnes;
    }


    ////////////////////////////////////////////////
    //
    // Fonction qui retourne le mot de passe hashé associé à un mail
    //
    ////////////////////////////////////////////////

    public function getMdpParMail($mail){
        $sql = 'select per_mdp from personne
                    where per_mail= :mail';

        $requete = $this->db->prepare($sql);
        $requete->bindValue(':mail', $mail, PDO::PARAM_STR);

        $requete->execute();

        $pwd=$requete->fetch(PDO::FETCH_OBJ);
        $requete->closeCursor();

        if ($pwd) {
            return $pwd->per_mdp;
        }else{
            return 0;
        }
    }


    ////////////////////////////////////////////////
    //
    // Fonction qui retourne le numero correspondant à un mail
    //
    ////////////////////////////////////////////////

    public function getIdParMail($mail){
        $sql = 'select per_num from personne
                    where per_mail=:mail';

        $requete = $this->db->prepare($sql);
        $requete->bindValue(':mail', $mail, PDO::PARAM_STR);

        $requete->execute();

        $pwd=$requete->fetch(PDO::FETCH_OBJ);
        $requete->closeCursor();
        
        if ($pwd){
            return $pwd->per_num;
        }else{
            return -1;
        }
    }
}
?>
