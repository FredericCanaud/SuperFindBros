<?php
class PossedeManager {

    ////////////////// Constructeur ////////////////

    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    ////////////////////////////////////////////////
    //
    // Fonction qui retourne tous les jeux possédés de la BD
    //
    ////////////////////////////////////////////////

    public function getAllJeuxPossedes() {
        $listeJeuxPossedes = array();
        $sql = 'SELECT per_num, jeu_num, tempsdejeumoyen FROM possede';
        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($jeuPossede = $requete->fetch(PDO::FETCH_OBJ)) $listeJeuxPossedes[] = new Possede($jeuPossede);
        $requete->closeCursor();
        return $listeJeuxPossedes;
    }

    public function ajouterJeuPersonne($pernum, $jeunum) {
        $sql = 'INSERT INTO possede VALUES(:per_num, :jeu_num,0)';

        $requete = $this->db->prepare($sql);
        $requete->bindValue(':per_num', $pernum, PDO::PARAM_INT);
        $requete->bindValue(':jeu_num', $jeunum, PDO::PARAM_INT);
        $requete->execute();
    }
}
?>
