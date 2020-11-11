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
                // inclure ici la page d'accueil des trépanés
                include_once('pages/accueil.inc.php');
            }
            break;

        case 1:
            // inclure ici la page de connexion
            include_once("pages/connexion.inc.php");
            break;

        /*case 2:
            // inclure ici la page liste des personnes
            include_once('pages/listerPersonnes.inc.php');
            break;
        case 3:
            // inclure ici la page modification des personnes
            if ($connec==2){
                include("pages/ModifierPersonne.inc.php");
            }
            break;
        case 4:
            // inclure ici la page suppression personnes
            if ($connec==2){
                include_once('pages/supprimerPersonne.inc.php');
            }
            break;
//
// Citations
//
        case 5:
            // inclure ici la page ajouter citations
            if ($connec==1||$connec==2){
                include("pages/ajouterCitation.inc.php");
            }
            break;

        case 6:
            // inclure ici la page liste des citations
            include("pages/listerCitation.inc.php");
            break;
//
// Villes
//

        case 7:
            // inclure ici la page ajouter ville
            if ($connec==1||$connec==2){
                include("pages/ajouterVille.inc.php");
            }
            break;

        case 8:
// inclure ici la page lister  ville
            include("pages/listerVilles.inc.php");
            break;

//

//
        case 9:
            if ($connec==1||$connec==2){
                include("pages/validerCitation.inc.php");
            }
            break;
        case 10:
            if ($connec==1||$connec==2){
                include("pages/rechercherCitation.inc.php");
            }
            break;

        case 11:
            if ($connec==1||$connec==2){
                include("pages/supprimerCitation.inc.php");
            }
            break;

        case 12:
            include("pages/deconnexion.inc.php");
            break;

        case 13:
            include("pages/connexion.inc.php");
            break;

        case 14:
            if ($connec==1||$connec==2){
                include("pages/modifierPersonne.inc.php");
            }
            break;

        case 15:
            if ($connec==2){
                include("pages/supprimerVille.inc.php");
            }
            break;
*/

        default : 	include_once('pages/accueil.inc.php');
    }

    ?>
</div>