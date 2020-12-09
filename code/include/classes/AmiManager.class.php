<?php
class AmiManager{

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

    public function getAmis($id){
        $listeAmis = array();
        $sql = 'select per_nom, per_prenom, per_pseudo, per_pernum from personne p 
                join ami a on p.per_num=a.per_pernum
                where a.per_num =:id
                union
                select per_nom, per_prenom, per_pseudo, a.per_num from personne p 
                join ami a on p.per_num=a.per_num
                where a.per_pernum =:id
                order by per_nom, per_prenom asc';

        $requete = $this->db->prepare($sql);
        $requete->bindValue(':id', $id, PDO::PARAM_INT);
        $requete->execute();

        while ($personne = $requete->fetch(PDO::FETCH_OBJ)){
            $listeAmis[] = new Personne($personne);
        }

        $requete->closeCursor();
        return $listeAmis;
    }

    public function supprimer($id, $idAmi){
        $sql = 'delete from ami where (per_num=:id and per_pernum=:idAmi) or (per_num=:idAmi and per_pernum=:id)';

        $requete = $this->db->prepare($sql);

        $requete->bindValue(':id',$id);
        $requete->bindValue(':idAmi',$idAmi);

        $retour=$requete->execute();
    }
}
?>