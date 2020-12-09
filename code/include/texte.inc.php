<div id="texte">
    <?php
    if (!empty($_GET["page"])){
        $page=$_GET["page"];}
    else
    {
        $page=0;
    }

    $connec = $_SESSION['estConnecte'];

    // connec == 1 <=> estConnecté
    // connec == 2 <=> estAdmin
    // connec == 0 <=> estPasConnecté

    switch ($page) {

        case 0:
            if ($connec==1||$connec==2) {
                // inclure ici la page d'accueil des connectés
                include_once('pages/accueilConnecte.inc.php');
            }else{
                // inclure ici la page d'accueil des non connectés
                include_once('pages/accueil.inc.php');
            }
            break;

        case 1:
            if ($connec==1||$connec==2) {
                // inclure ici la page de deconnexion
                include_once("pages/deconnexion.inc.php");
            }else{
                // inclure ici la page de connexion
                include_once("pages/connexion.inc.php");
            }
            break;

        case 2:
            include_once("pages/inscriptionEtape1.inc.php");
            break;

        case 3:
            include_once("pages/inscriptionEtape2.inc.php");
            break;

    // ---- PROFIL ----

        case 4:
            // inclure ici la page pour modifier le profil d'un joueur
            include_once("pages/modifierProfil.inc.php");
            break;

        case 5:
            // inclure ici la page du profil
            include_once("pages/afficherProfil.inc.php");
            break;

        case 6:
            // inclure ici la page pour inclure les détails d'un jour
            include_once("pages/informationJoueur.inc.php");
            break;


    // ---- AMIS ----

        case 7:
            // inclure ici la page pour ajouter un ami
            include_once("pages/ajouterAmi.inc.php");
            break;

        case 8:
            // inclure ici la page pour afficher les amis
            include_once("pages/afficherAmis.inc.php");
            break;


    //---- GROUPE ----

        case 9:
            // inclure ici la page pour créer un groupe
            include_once("pages/creerGroupe.inc.php");
            break;

        case 10:
            // inclure ici la page pour rechercher un groupe
            include_once("pages/rechercherGroupe.inc.php");
            break;

        case 11:
            // inclure ici la page pour inviter un joueur dans un groupe
            include_once("pages/inviterJoueurDansGroupe.inc.php");
            break;


    // ---- JEUX ----

        case 12:
            // inclure ici la page pour afficher les jeux du joueur
            include_once("pages/afficherJeu.inc.php");
            break;

        default : 	include_once('pages/accueil.inc.php');
    }

    ?>
</div>