<?php
class Possede
{

    ////////////////////// Attributs ////////////////

    private $per_num;
    private $jeu_num;
    private $tempsdejeumoyen;

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
                case 'jeu_num':
                    $this->setJeuNum($valeur);
                    break;
                case 'tempsdejeumoyen':
                    $this->setTempsDeJeu($valeur);
                    break;
            }
        }
    }

    ////////////////// Getters ////////////////////

    public function getJeuNum()
    {
        return $this->jeu_num;
    }
    public function getPerNum()
    {
        return $this->per_num;
    }
    public function getTempsDeJeu()
    {
        return $this->tempsdejeumoyen;
    }

    ////////////////////// Setters //////////////////////

    public function setJeuNum($jeu_num)
    {
        $this->jeu_num = $jeu_num;
    }
    public function setPerNum($per_num)
    {
        $this->per_num = $per_num;
    }
    public function setTempsDeJeu($tempsDeJeuMoyen)
    {
        $this->tempsdejeumoyen = $tempsDeJeuMoyen;
    }
}
?>
