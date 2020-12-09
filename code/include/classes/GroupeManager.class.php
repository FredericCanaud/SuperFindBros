<?php
class GroupeManager {

    ////////////////// Constructeur ////////////////

    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    ////////////////////////////////////////////////
    //
    // Fonction qui retourne tous les groupes de la BD
    //
    ////////////////////////////////////////////////

    public function getAllAmis() {
        $listeGroupes = array();
        $sql = 'SELECT grp_num, grp_nom FROM groupe';
        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($groupe = $requete->fetch(PDO::FETCH_OBJ)) $listeGroupes[] = new Groupe($groupe);
        $requete->closeCursor();
        return $listeGroupes;
    }
}
?>