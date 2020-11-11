<?php
class AppartientManager {

    ////////////////// Constructeur ////////////////

    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    ////////////////////////////////////////////////
    //
    // Fonction qui retourne tous les associations personnes / groupes de la BD
    //
    ////////////////////////////////////////////////

    public function getAllMembres() {
        $listeMembres = array();
        $sql = 'SELECT per_num, grp_num FROM appartient';
        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($membre = $requete->fetch(PDO::FETCH_OBJ)) $listeMembres[] = new Membre($membre);
        $requete->closeCursor();
        return $listeMembres;
    }
}
?>