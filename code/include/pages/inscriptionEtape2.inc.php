<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Inscription deuxième étape</title>
    <link rel="stylesheet" type="text/css" href="css/inscription.css" />
</head>
<body>
<?php
$pdo = new Mypdo();
if(isset($_POST["jeu"])){
    header("refresh:2;url=index.php");
    $personneManager = new PersonneManager($pdo);
    $pers = $personneManager->ajouterPersonne($_SESSION["brow"]);

    $possedeManager = new PossedeManager($pdo);
    foreach($_POST["jeu"] as $key => $jeunum){
        $possedeManager->ajouterJeuPersonne($pers->{"per_num"},$jeunum);
    }
    ?>
    <p class="valid"> Vous êtes bien inscrit sur le site ! </p>
    <p> Redirection automatique dans 2 secondes... </p>
    <?php
}

else if(empty($_POST["per_nom"]) || empty($_POST["per_prenom"]) || empty($_POST["per_age"])){
    header("refresh:2;url=index.php");
    ?>
    <p class="error"> Vous tentez d'accéder cette page de la mauvaise façon ! </p>
    <p class="error"> Redirection automatique dans 2 secondes... </p>
    <?php
} else{
    if (empty($_POST["per_jeu"]) || empty($_POST["per_console"])){
        $_SESSION["brow"] = array(
            "per_pseudo" => $_SESSION["brow"]["per_pseudo"],
            "per_mail" => $_SESSION["brow"]["per_mail"],
            "per_mdp" => $_SESSION["brow"]["per_mdp"],
            "per_nom" => $_POST["per_nom"],
            "per_prenom" => $_POST["per_prenom"],
            "per_age" => $_POST["per_age"]
        );
        ?>
    <div class="carte">
        <form action="#" id="insert" method="post">
            <h1> Vous y êtes presque ! </h1>
            <h2> Avant d'accéder à l'application, nous avons
                besoin de quelques informations supplémentaires pour complémenter votre profil ;)</h2>
            <h2>A quel jeu jouez-vous ?</h2>
            <table>
                <?php
                $jeuManager = new JeuManager($pdo);
                $jeux = $jeuManager->getAllNomJeux();
                foreach($jeux as $jeu){?>
                <tr>
                    <td>
                        <label for="jeux"><?php echo $jeu->getJeuNom() ?></label>
                    </td>
                    <td>
                        <input type="checkbox" id="jeux" name="jeu[]" value="<?php echo $jeu->getJeuNum() ?>">
                    </td>
                </tr>
                    <?php
                }
                ?>
            </table>
            <input type="submit" value="Valider"/>
        </form>
    </div>
        <br />
        <?php
    }
}


?>
</body>
</html>
