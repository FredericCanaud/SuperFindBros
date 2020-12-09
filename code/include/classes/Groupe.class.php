<?php
class Groupe
{

    ////////////////////// Attributs ////////////////

    private $grp_num;
    private $grp_nom;

    ////////////////// Constructeurs ////////////////

    public function __construct($valeurs = array())
    {
        if (!empty($valeurs)) $this->affecte($valeurs);
    }

    public function affecte($donnees)
    {
        foreach ($donnees as $attribut => $valeur)
        {
            switch ($attribut)
            {
                case 'grp_num':
                    $this->setGrpNum($valeur);
                    break;
                case 'grp_nom':
                    $this->setGrpNom($valeur);
                    break;
            }
        }
    }

    ////////////////// Getters ////////////////////

    public function getGrpNum()
    {
        return $this->grp_num;
    }
    public function getGrpNom()
    {
        return $this->grp_nom;
    }

    ////////////////////// Setters //////////////////////

    public function setGrpNum($grp_num)
    {
        $this->grp_num = $grp_num;
    }
    public function setGrpNom($grp_nom)
    {
        $this->grp_nom = $grp_nom;
    }
}
?>
