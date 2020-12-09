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

    ////////////////////////////////////////////////
    //
    // Fonction qui modifie une personne
    //
    ////////////////////////////////////////////////

    public function updatePersonne($id, $nom, $prenom, $pseudo, $age, $mail, $mdp){
        $this->setNom($id, $nom);
        $this->setPrenom($id, $prenom);
        $this->setPseudo($id, $pseudo);
        $this->setAge($id, $age);
        $this->setMail($id, $mail);

        if ($mdp != -1){
            $salt = "48@!alsd";
            $hash = sha1(sha1($mdp).$salt);
            $this->setMdp($id, $hash);
        }
    }


    ////////////////////////////////////////////////
    //
    // Setters type database
    //
    ////////////////////////////////////////////////


    public function setNom($id,$valeur){
        $sql = 'update personne set per_nom=:valeur where per_num=:id';

        $requete = $this->db->prepare($sql);

        $requete->bindValue(':id',$id);
        $requete->bindValue(':valeur',$valeur);

        $retour=$requete->execute();
    }

    public function setPrenom($id,$valeur){
        $sql = 'update personne set per_prenom=:valeur where per_num=:id';

        $requete = $this->db->prepare($sql);

        $requete->bindValue(':id',$id);
        $requete->bindValue(':valeur',$valeur);

        $retour=$requete->execute();
    }

    public function setPseudo($id,$valeur){
        $sql = 'update personne set per_pseudo=:valeur where per_num=:id';

        $requete = $this->db->prepare($sql);

        $requete->bindValue(':id',$id);
        $requete->bindValue(':valeur',$valeur);

        $retour=$requete->execute();
    }

    public function setAge($id,$valeur){
        $sql = 'update personne set per_age=:valeur where per_num=:id';

        $requete = $this->db->prepare($sql);

        $requete->bindValue(':id',$id);
        $requete->bindValue(':valeur',$valeur);

        $retour=$requete->execute();
    }

    public function setMail($id,$valeur){
        $sql = 'update personne set per_mail=:valeur where per_num=:id';

        $requete = $this->db->prepare($sql);

        $requete->bindValue(':id',$id);
        $requete->bindValue(':valeur',$valeur);

        $retour=$requete->execute();
    }

    public function setMdp($id,$valeur){
        $sql = 'update personne set per_mdp=:valeur where per_num=:id';

        $requete = $this->db->prepare($sql);

        $requete->bindValue(':id',$id);
        $requete->bindValue(':valeur',$valeur);

        $retour=$requete->execute();
    }









}
?>
