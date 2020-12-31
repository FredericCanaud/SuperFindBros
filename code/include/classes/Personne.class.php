<?php
class Personne
{

    ////////////////////// Attributs ////////////////

    private $per_num;
    private $per_nom;
    private $per_prenom;
    private $per_age;
    private $per_mail;
    private $per_pseudo;
    private $per_mdp;
    private $per_avatar;

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
                case 'per_nom':
                    $this->setPerNom($valeur);
                    break;
                case 'per_prenom':
                    $this->setPerPrenom($valeur);
                    break;
                case 'per_age':
                    $this->setPerAge($valeur);
                    break;
                case 'per_mail':
                    $this->setPerMail($valeur);
                    break;
                case 'per_pseudo':
                    $this->setPerPseudo($valeur);
                    break;
                case 'per_mdp':
                    $this->setPerMdp($valeur);
                    break;
                case 'per_avatar':
                    $this->setPerAvatar($valeur);
                    break;
            }
        }
    }

    ////////////////// Getters ////////////////////

    public function getPerNum()
    {
        return $this->per_num;
    }
    public function getPerNom()
    {
        return $this->per_nom;
    }
    public function getPerPrenom()
    {
        return $this->per_prenom;
    }
    public function getPerAge()
    {
        return $this->per_age;
    }
    public function getPerMail()
    {
        return $this->per_mail;
    }
    public function getPerPseudo()
    {
        return $this->per_pseudo;
    }
    public function getPerMdp()
    {
        return $this->per_mdp;
    }
    public function getPerAvatar()
    {
        return $this->per_avatar;
    }

    ////////////////////// Setters //////////////////////

    public function setPerNum($per_num)
    {
        $this->per_num = $per_num;
    }
    public function setPerNom($per_nom)
    {
        $this->per_nom = $per_nom;
    }
    public function setPerPrenom($per_prenom)
    {
        $this->per_prenom = $per_prenom;
    }
    public function setPerAge($per_age)
    {
        $this->per_age = $per_age;
    }
    public function setPerMail($per_mail)
    {
        $this->per_mail = $per_mail;
    }
    public function setPerPseudo($per_pseudo)
    {
        $this->per_pseudo = $per_pseudo;
    }
    public function setPerMdp($per_mdp)
    {
        $this->per_mdp = $per_mdp;
    }
    public function setPerAvatar($per_avatar)
    {
        $this->per_avatar = $per_avatar;
    }
}
?>
