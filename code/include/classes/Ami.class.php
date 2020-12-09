<?php
class Ami
{

    ////////////////////// Attributs ////////////////

    private $per_num;
    private $per_pernum;

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
                case 'per_pernum':
                    $this->setPerPernum($valeur);
                    break;
            }
        }
    }

    ////////////////// Getters ////////////////////

    public function getPerNum()
    {
        return $this->per_num;
    }
    public function getPerPernum()
    {
        return $this->per_pernum;
    }

    ////////////////////// Setters //////////////////////

    public function setPerNum($per_num)
    {
        $this->per_num = $per_num;
    }
    public function setPerPernum($per_pernum)
    {
        $this->per_pernum = $per_pernum;
    }
}
?>
