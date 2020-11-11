<?php
class TypeManager {

    ////////////////// Constructeur ////////////////

    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    ////////////////////////////////////////////////
    //
    // Fonction qui retourne tous les types de la BD
    //
    ////////////////////////////////////////////////

    public function getAllTypes() {
        $listeTypes = array();
        $sql = 'SELECT typ_num, typ_genre FROM type';
        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($type = $requete->fetch(PDO::FETCH_OBJ)) $listeTypes[] = new Type($type);
        $requete->closeCursor();
        return $listeTypes;
    }
}
?>
