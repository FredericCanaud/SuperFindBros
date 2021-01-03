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
    public function getAllPersonnes(){
        $listePersonnes = array();
        $sql = 'SELECT per_num, per_nom, per_prenom, per_pseudo, per_age, per_mail, per_avatar FROM personne 
                WHERE per_admin NOT IN(
                    SELECT per_admin FROM personne WHERE per_admin = TRUE
                )';
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
    // Fonction qui retourne des personnes aléatoires de la BD
    //
    ////////////////////////////////////////////////
    public function getPersonnesAleatoires(){
        $listePersonnes = array();
        $sql = 'SELECT per_num, per_pseudo, per_age, per_avatar FROM personne 
                WHERE per_admin NOT IN(
                    SELECT per_admin FROM personne WHERE per_admin = TRUE
                )
                ORDER BY RAND() LIMIT 6';
        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($personne = $requete->fetch(PDO::FETCH_OBJ)){
            $listePersonnes[] = new Personne($personne);
        }
        $requete->closeCursor();
        return $listePersonnes;
    }

    public function getPersonnesByJeu($jeunum, $pernum){
        $listePersonnes = array();
        $sql = 'SELECT DISTINCT pe.per_num, per_pseudo, per_age, per_avatar FROM personne pe
                JOIN possede po ON pe.per_num = po.per_num
                WHERE jeu_num = :jeu_num AND pe.per_num != :per_num ';

        $requete = $this->db->prepare($sql);
        $requete->bindValue(':jeu_num', $jeunum);
        $requete->bindValue(':per_num', $pernum);
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
        $sql = 'SELECT per_num, per_nom, per_prenom, per_age, per_mail, per_pseudo, per_admin FROM personne
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
    // Fonction qui insère une personne dans la BD
    //
    ////////////////////////////////////////////////

    public function ajouterPersonne($personne) {
        $salt = "48@!alsd";
        $hash = sha1(sha1($personne["per_mdp"]).$salt);
        $sql = 'INSERT INTO personne(per_prenom, per_nom, per_age, per_mail, per_pseudo, per_mdp, per_avatar, per_admin) VALUES(:per_prenom, 
                :per_nom, :per_age, :per_mail, :per_pseudo, :per_mdp, :per_avatar, FALSE)';

        $requete = $this->db->prepare($sql);
        $requete->bindValue(':per_prenom', $personne["per_prenom"], PDO::PARAM_STR);
        $requete->bindValue(':per_nom', $personne["per_nom"], PDO::PARAM_STR);
        $requete->bindValue(':per_age', $personne["per_age"], PDO::PARAM_INT);
        $requete->bindValue(':per_mail', $personne["per_mail"], PDO::PARAM_STR);
        $requete->bindValue(':per_pseudo', $personne["per_pseudo"], PDO::PARAM_STR);
        $requete->bindValue(':per_mdp', $hash, PDO::PARAM_STR);
        $requete->bindValue(':per_avatar', $personne["per_avatar"], PDO::PARAM_STR);
        $requete->execute();

        $sql = 'SELECT per_num FROM personne WHERE per_mail = :per_mail AND per_mdp = :per_mdp';
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':per_mail', $personne["per_mail"], PDO::PARAM_STR);
        $requete->bindValue(':per_mdp', $hash, PDO::PARAM_STR);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_OBJ);
    }

    ////////////////////////////////////////////////
    //
    // Fonction qui retourne le mot de passe hashé associé à un mail
    //
    ////////////////////////////////////////////////

    public function getMdpParMail($mail){
        $sql = 'SELECT per_mdp FROM personne
                    WHERE per_mail= :mail';

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
        $sql = 'SELECT per_num FROM personne
                    WHERE per_mail=:mail';

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
        $sql = 'SELECT per_num FROM personne
                    WHERE per_pseudo=:pseudo';

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
    // Fonction qui supprime une personne de la table Personne
    //
    ////////////////////////////////////////////////
    public function supprimerPersonne($per_num)
    {
        $sql = 'DELETE FROM personne WHERE per_num = :per_num';
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':per_num', $per_num, PDO::PARAM_INT);
        $requete->execute();
    }

    ////////////////////////////////////////////////
    //
    // Setters type database
    //
    ////////////////////////////////////////////////


    public function setNom($id,$valeur){
        $sql = 'UPDATE personne SET per_nom=:valeur WHERE per_num=:id';

        $requete = $this->db->prepare($sql);

        $requete->bindValue(':id',$id);
        $requete->bindValue(':valeur',$valeur);

        $requete->execute();
    }

    public function setPrenom($id,$valeur){
        $sql = 'UPDATE personne SET per_prenom=:valeur WHERE per_num=:id';

        $requete = $this->db->prepare($sql);

        $requete->bindValue(':id',$id);
        $requete->bindValue(':valeur',$valeur);

        $requete->execute();
    }

    public function setPseudo($id,$valeur){
        $sql = 'UPDATE personne SET per_pseudo=:valeur WHERE per_num=:id';

        $requete = $this->db->prepare($sql);

        $requete->bindValue(':id',$id);
        $requete->bindValue(':valeur',$valeur);

        $requete->execute();
    }

    public function setAge($id,$valeur){
        $sql = 'UPDATE personne SET per_age=:valeur WHERE per_num=:id';

        $requete = $this->db->prepare($sql);

        $requete->bindValue(':id',$id);
        $requete->bindValue(':valeur',$valeur);

        $requete->execute();
    }

    public function setMail($id,$valeur){
        $sql = 'UPDATE personne SET per_mail=:valeur WHERE per_num=:id';

        $requete = $this->db->prepare($sql);

        $requete->bindValue(':id',$id);
        $requete->bindValue(':valeur',$valeur);

        $requete->execute();
    }

    public function setMdp($id,$valeur){
        $sql = 'UPDATE personne SET per_mdp=:valeur where per_num=:id';

        $requete = $this->db->prepare($sql);

        $requete->bindValue(':id',$id);
        $requete->bindValue(':valeur',$valeur);

        $requete->execute();
    }


}
?>
