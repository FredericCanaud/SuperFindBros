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
        while ($personne = $requete->fetch(PDO::FETCH_OBJ)) $listePersonnes[] = new Personne($personne);
        $requete->closeCursor();
        return $listePersonnes;
    }
}
?>
