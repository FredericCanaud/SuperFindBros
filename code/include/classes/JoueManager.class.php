<?php
class JoueManager {

    ////////////////// Constructeur ////////////////

    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    ////////////////////////////////////////////////
    //
    // Fonction qui retourne tous les jeux des groupes de la BD
    //
    ////////////////////////////////////////////////

    public function getAllJeuxGroupes() {
        $listeJeuxGroupes = array();
        $sql = 'SELECT jeu_num, grp_num FROM joue';
        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($jeuGroupe = $requete->fetch(PDO::FETCH_OBJ)) $listeJeuxGroupes[] = new Joue($jeuGroupe);
        $requete->closeCursor();
        return $listeJeuxGroupes;
    }

    ////////////////////////////////////////////////
    //
    // Fonction qui supprime un jeu de la table Joue
    //
    ////////////////////////////////////////////////
    public function supprimerJeu($jeu_num)
    {
        $sql = 'DELETE FROM joue WHERE jeu_num = :jeu_num';
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':jeu_num', $jeu_num, PDO::PARAM_INT);
        $requete->execute();
    }
}
?>