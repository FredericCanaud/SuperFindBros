<?php
class Jeu
{

    ////////////////////// Attributs ////////////////

    private $jeu_num;
    private $jeu_nom;
    private $jeu_annee;
    private $jeu_editeur;
    private $jeu_description;
    private $jeu_image;

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
                case 'jeu_nom':
                    $this->setJeuNom($valeur);
                    break;
                case 'jeu_annee':
                    $this->setJeuAnnee($valeur);
                    break;
                case 'jeu_editeur':
                    $this->setJeuEditeur($valeur);
                    break;
                case 'jeu_description':
                    $this->setJeuDescription($valeur);
                    break;
                case 'jeu_image':
                    $this->setJeuImage($valeur);
                    break;
            }
        }
    }

    ////////////////// Getters ////////////////////

    public function getJeuNum()
    {
        return $this->jeu_num;
    }
    public function getJeuNom()
    {
        return $this->jeu_nom;
    }
    public function getJeuAnnee()
    {
        return $this->jeu_annee;
    }
    public function getJeuEditeur()
    {
        return $this->jeu_editeur;
    }
    public function getJeuDescription()
    {
        return $this->jeu_description;
    }
    public function getJeuImage()
    {
        return $this->jeu_image;
    }

    ////////////////////// Setters //////////////////////

    public function setJeuNum($jeu_num)
    {
        $this->jeu_num = $jeu_num;
    }
    public function setJeuNom($jeu_nom)
    {
        $this->jeu_nom = $jeu_nom;
    }
    public function setJeuAnnee($jeu_annee)
    {
        $this->jeu_annee = $jeu_annee;
    }
    public function setJeuEditeur($jeu_editeur)
    {
        $this->jeu_editeur = $jeu_editeur;
    }
    public function setJeuDescription($jeu_description)
    {
        $this->jeu_description = $jeu_description;
    }
    public function setJeuImage($jeu_image)
    {
        $this->jeu_image= $jeu_image;
    }
}
?>
