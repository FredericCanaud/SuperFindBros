<?php


class Tchat
{
    ////////////////////// Attributs ////////////////

    private $message_num;
    private $exped_num;
    private $desti_num;
    private $message;
    private $date;

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
                case 'exped_num':
                    $this->setExpedNum($valeur);
                    break;
                case 'desti_num':
                    $this->setDestiNum($valeur);
                    break;
                case 'message':
                    $this->setMessage($valeur);
                    break;
                case 'date':
                    $this->setDate($valeur);
                    break;
            }
        }
    }

    ////////////////// Getters ////////////////////

    public function getMessageNum()
    {
        return $this->exped_num;
    }
    public function getExpedNum()
    {
        return $this->exped_num;
    }
    public function getDestiNum()
    {
        return $this->desti_num;
    }
    public function getMessage()
    {
        return $this->message;
    }
    public function getDate()
    {
        return $this->date;
    }

    ////////////////////// Setters //////////////////////

    public function setExpedNum($exped_num)
    {
        $this->exped_num = $exped_num;
    }
    public function setDestiNum($desti_num)
    {
        $this->desti_num = $desti_num;
    }
    public function setMessage($message)
    {
        $this->message = $message;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }
}