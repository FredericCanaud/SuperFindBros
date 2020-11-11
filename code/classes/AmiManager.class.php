<?php
class AmiManager {

    ////////////////// Constructeur ////////////////

    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    ////////////////////////////////////////////////
    //
    // Fonction qui retourne tous les amis de la BD
    //
    ////////////////////////////////////////////////

    public function getAllAmis() {
        $listeAmis = array();
        $sql = 'SELECT per_num, per_pernum FROM ami';
        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($ami = $requete->fetch(PDO::FETCH_OBJ)) $listeAmis[] = new Ami($ami);
        $requete->closeCursor();
        return $listeAmis;
    }
}
?>