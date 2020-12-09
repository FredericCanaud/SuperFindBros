<?php
class Joue
{

    ////////////////////// Attributs ////////////////

    private $jeu_num;
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
                case 'jeu_num':
                    $this->setJeuNum($valeur);
                    break;
                case 'grp_num':
                    $this->setGrpNum($valeur);
                    break;
            }
        }
    }

    ////////////////// Getters ////////////////////

    public function getJeuNum()
    {
        return $this->jeu_num;
    }
    public function getGrpNum()
    {
        return $this->grp_num;
    }

    ////////////////////// Setters //////////////////////

    public function setJeuNum($jeu_num)
    {
        $this->jeu_num = $jeu_num;
    }
    public function setGrpNum($grp_num)
    {
        $this->grp_num = $grp_num;
    }
}
?>
