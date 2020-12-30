<?php


class TchatManager
{
    ////////////////// Constructeur ////////////////

    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    ////////////////////////////////////////////////
    //
    // Fonction qui retourne tous les messages des utilisateurs
    //
    ////////////////////////////////////////////////

    public function getAllMessages() {
        $listeMessages = array();
        $sql = 'SELECT exped_num, desti_num, message, date FROM tchat';
        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($message = $requete->fetch(PDO::FETCH_OBJ)){
            $listeMessages[] = new Tchat($message);
        }
        $requete->closeCursor();
        return $listeMessages;
    }

    ////////////////////////////////////////////////
    //
    // Fonction qui retourne les derniers messages entre deux utilisateurs
    //
    ////////////////////////////////////////////////

    public function getConversation($exped_num, $desti_num) {
        $listeMessages = array();
        $sql = 'SELECT exped_num, desti_num, message, date FROM tchat WHERE exped_num = :exped_num AND desti_num = :desti_num
                UNION SELECT exped_num, desti_num, message, date FROM tchat WHERE exped_num = :desti_num AND desti_num = :exped_num
                ORDER BY date';
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':exped_num', $exped_num, PDO::PARAM_INT);
        $requete->bindValue(':desti_num', $desti_num, PDO::PARAM_INT);
        $requete->execute();
        while ($message = $requete->fetch(PDO::FETCH_OBJ)){
            $listeMessages[] = new Tchat($message);
        }
        $requete->closeCursor();
        return $listeMessages;
    }

    ////////////////////////////////////////////////
    //
    // Fonction qui récupère les nouveaux messages à partir d'un id
    //
    ////////////////////////////////////////////////
    public function getDernierMessage($exped_num, $desti_num, $message_num) {
        $listeMessages = array();
        $sql = 'SELECT exped_num, desti_num, message, date FROM tchat WHERE exped_num = :exped_num AND desti_num = :desti_num AND message_num > :message_num
                UNION SELECT exped_num, desti_num, message, date FROM tchat WHERE exped_num = :desti_num AND desti_num = :exped_num AND message_num > :message_num
                ORDER BY date';
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':exped_num', $exped_num, PDO::PARAM_INT);
        $requete->bindValue(':desti_num', $desti_num, PDO::PARAM_INT);
        $requete->bindValue(':message_num', $message_num, PDO::PARAM_INT);
        $requete->execute();
        while ($message = $requete->fetch(PDO::FETCH_OBJ)){
            $listeMessages[] = new Tchat($message);
        }
        $requete->closeCursor();
        return $listeMessages;
    }

    ////////////////////////////////////////////////
    //
    // Fonction qui ajoute un message en BD
    //
    ////////////////////////////////////////////////

    public function addMessage($exped_num, $desti_num, $message) {
        $sql = 'INSERT INTO tchat (exped_num, desti_num, message, date) VALUES (:exped_num, :desti_num, :message, now())';
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':exped_num', $exped_num, PDO::PARAM_INT);
        $requete->bindValue(':desti_num', $desti_num, PDO::PARAM_INT);
        $requete->bindValue(':message', $message, PDO::PARAM_STR);
        $requete->execute();
    }
}