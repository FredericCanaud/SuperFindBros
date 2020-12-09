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
    // Fonction qui retourne la personne associée à l'id
    //
    ////////////////////////////////////////////////

    public function getPersonneParId($id) {
        $sql = 'SELECT per_num, per_nom, per_prenom, per_age, per_mail, per_pseudo FROM personne
                where per_num=:id';

        $requete = $this->db->prepare($sql);
        $requete->bindValue(':id', $id, PDO::PARAM_INT);
        $requete->execute();
        $personneSQL = $requete->fetch(PDO::FETCH_OBJ);

        $personne = new Personne($personneSQL);

        $requete->closeCursor();
        return $personne;
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


    ////////////////////////////////////////////////
    //
    // Fonction qui retourne l'id associé à un pseudo
    //
    ////////////////////////////////////////////////

    public function getIdParPseudo($pseudo){
        $sql = 'select per_num from personne
                    where per_pseudo=:pseudo';

        $requete = $this->db->prepare($sql);
        $requete->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

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
