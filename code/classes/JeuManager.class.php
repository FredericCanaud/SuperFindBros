<?php
class JeuManager {

    ////////////////// Constructeur ////////////////

    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    ////////////////////////////////////////////////
    //
    // Fonction qui retourne tous les jeux valides de la BD
    //
    ////////////////////////////////////////////////

    public function getAllJeux() {
        $listeJeux = array();
        $sql = 'SELECT jeu_num, jeu_nom, jeu_annee, jeu_editeur, jeu_description FROM jeu';
        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($jeu = $requete->fetch(PDO::FETCH_OBJ)) $listeJeux[] = new Jeu($jeu);
        $requete->closeCursor();
        return $listeJeux;
    }
}
?>
