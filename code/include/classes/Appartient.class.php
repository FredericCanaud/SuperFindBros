<?php
class Appartient
{

    ////////////////////// Attributs ////////////////

    private $per_num;
    private $grp_num;

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
                case 'per_num':
                    $this->setPerNum($valeur);
                    break;
                case 'grp_num':
                    $this->setGrpNum($valeur);
                    break;
            }
        }
    }

    ////////////////// Getters ////////////////////

    public function getPerNum()
    {
        return $this->per_num;
    }
    public function getGrpNum()
    {
        return $this->grp_num;
    }

    ////////////////////// Setters //////////////////////

    public function setPerNum($per_num)
    {
        $this->per_num = $per_num;
    }
    public function setGrpNum($grp_num)
    {
        $this->grp_num = $grp_num;
    }
}
?>
