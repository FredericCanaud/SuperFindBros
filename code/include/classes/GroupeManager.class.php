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

    public function getAllGroupe() {
        $listeGroupes = array();
        $sql = 'SELECT grp_num, grp_nom FROM groupe';
        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($groupe = $requete->fetch(PDO::FETCH_OBJ)) $listeGroupes[] = new Groupe($groupe);
        $requete->closeCursor();
        return $listeGroupes;
    }

    ////////////////////////////////////////////////
    //
    // Fonction qui retourne les groupes liés à l'id
    //
    ////////////////////////////////////////////////

    public function getGroupeParIdPersonne($id){
        $listeGroupes = array();
        $sql = 'SELECT grp_num, grp_nom FROM groupe g
                join appartient a a.grp_num=g.grp_num
                where per_num=:id';
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':id', $id, PDO::PARAM_INT);
        $requete->execute();
        while ($groupe = $requete->fetch(PDO::FETCH_OBJ)){
            $listeGroupes[] = new Groupe($groupe);
        }
        $requete->closeCursor();
        return $listeGroupes;
    }



}
?>