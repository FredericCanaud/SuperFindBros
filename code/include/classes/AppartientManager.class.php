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

    ////////////////////////////////////////////////
    //
    // Fonction qui supprime une personne de la table Appartient
    //
    ////////////////////////////////////////////////
    public function supprimerPersonne($per_num)
    {
        $sql = 'DELETE FROM appartient WHERE per_num = :per_num';
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':per_num', $per_num, PDO::PARAM_INT);
        $requete->execute();
    }
}
?>