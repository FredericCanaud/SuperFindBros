<?php
class Type
{

    ////////////////////// Attributs ////////////////

    private $typ_num;
    private $typ_genre;

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
                case 'typ_num':
                    $this->setTypNum($valeur);
                    break;
                case 'typ_genre':
                    $this->setTypGenre($valeur);
                    break;
            }
        }
    }

    ////////////////// Getters ////////////////////

    public function getTypNum()
    {
        return $this->typ_num;
    }
    public function getTypGenre()
    {
        return $this->typ_genre;
    }

    ////////////////////// Setters //////////////////////

    public function setTypNum($typ_num)
    {
        $this->typ_num = $typ_num;
    }
    public function setTypGenre($typ_genre)
    {
        $this->typ_genre = $typ_genre;
    }
}
?>
