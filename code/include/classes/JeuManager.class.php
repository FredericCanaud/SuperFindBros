<?php
class JeuManager {

    ////////////////// Constructeur ////////////////

    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    public function getJeuxFromPersonne($pernum) {
        $listeJeuxPossedes = array();
        $sql = 'SELECT p.jeu_num, jeu_nom, jeu_image FROM possede p
                JOIN jeu j ON j.jeu_num = p.jeu_num
                WHERE p.per_num = :per_num';
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':per_num', $pernum, PDO::PARAM_INT);
        $requete->execute();
        while ($jeuPossede = $requete->fetch(PDO::FETCH_OBJ)) $listeJeuxPossedes[] = new Jeu($jeuPossede);
        $requete->closeCursor();
        return $listeJeuxPossedes;
    }

    ////////////////////////////////////////////////
    //
    // Fonction qui retourne tous les jeux valides de la BD
    //
    ////////////////////////////////////////////////
    public function getAllNomJeux() {
        $listeJeux = array();
        $sql = 'SELECT jeu_num, jeu_nom FROM jeu';
        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($jeu = $requete->fetch(PDO::FETCH_OBJ)) $listeJeux[] = new Jeu($jeu);
        $requete->closeCursor();
        return $listeJeux;
    }

}
?>
