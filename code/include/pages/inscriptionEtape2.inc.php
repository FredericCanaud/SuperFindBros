<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Inscription deuxième étape</title>
    <link rel="stylesheet" type="text/css" href="css/inscription.css" />
</head>
<body>
<?php
if(empty($_POST["per_nom"]) || empty($_POST["per_prenom"]) || empty($_POST["per_age"])){
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
        <form action="index.php?page=4" id="insert" method="post">
            <h1> Vous y êtes presque ! </h1>
            <h2> Avant d'accéder à l'application, nous avons
                besoin de quelques informations supplémentaires pour complémenter votre profil ;)</h2>
            <h2>Quelles consoles possédez-vous ?</h2>
            <table>
                <tr>
                    <td>
                        <label for="PC">PC</label>
                    </td>
                    <td>
                        <input type="checkbox" id="PC" name="PC" value="PC">
                    </td>
                    <td>
                        <label for="XboxOne">Xbox ONE</label>
                    </td>
                    <td>
                        <input type="checkbox" id="XboxOne" name="XboxOne" value="XboxOne">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Xbox360">Xbox 360</label>
                    </td>
                    <td>
                        <input type="checkbox" id="Xbox360" name="Xbox360" value="Xbox360">
                    </td>
                    <td>
                        <label for="Switch">Nintendo Switch</label>
                    </td>
                    <td>
                        <input type="checkbox" id="Switch" name="Switch" value="Switch">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="PS3">PlayStation 3</label>
                    </td>
                    <td>
                        <input type="checkbox" id="PS3" name="PS3" value="PS3">
                    </td>
                    <td>
                        <label for="PS4">PlayStation 4</label>
                    </td>
                    <td>
                        <input type="checkbox" id="PS4" name="PS4" value="PS4">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="PS5">PlayStation 5</label>
                    </td>
                    <td>
                        <input type="checkbox" id="PS5" name="PS5" value="PS5">
                    </td>
                    <td>
                        <label for="Telephone">Telephone</label>
                    </td>
                    <td>
                        <input type="checkbox" id="Telephone" name="Telephone" value="Telephone">
                    </td>
                </tr>
            </table>
            <h2>A quel jeu jouez-vous ?</h2>
            <table>
                <tr>
                    <td>
                        <label for="SSBU">Super Smash Bros. Ultimate</label>
                    </td>
                    <td>
                        <input type="checkbox" id="SSBU" name="SSBU" value="SSBU">
                    </td>
                    <td>
                        <label for="LOL">League Of Legends</label>
                    </td>
                    <td>
                        <input type="checkbox" id="LOL" name="LOL" value="LOL">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="AmongUs">Among Us</label>
                    </td>
                    <td>
                        <input type="checkbox" id="AmongUs" name="AmongUs" value="AmongUs">
                    </td>
                    <td>
                        <label for="MarioKart">Mario Kart 8 Deluxe</label>
                    </td>
                    <td>
                        <input type="checkbox" id="MarioKart" name="MarioKart" value="MarioKart">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="FallGuys">Fall Guys</label>
                    </td>
                    <td>
                        <input type="checkbox" id="FallGuys" name="FallGuys" value="FallGuys">
                    </td>
                    <td>
                        <label for="CIV">Civilisation VI</label>
                    </td>
                    <td>
                        <input type="checkbox" id="CIV" name="CIV" value="CIV">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="ACNH">Animal Crossing : New Horizons</label>
                    </td>
                    <td>
                        <input type="checkbox" id="ACNH" name="ACNH" value="ACNH">
                    </td>
                    <td>
                        <label for="CSGO">Counter Strike : Global Offensive</label>
                    </td>
                    <td>
                        <input type="checkbox" id="CSGO" name="CSGO" value="CSGO">
                    </td>
                </tr>
            </table>
            <input type="submit" value="Valider"/>
        </form>
        <br />
        <?php
    }
    else if(!empty($_POST["per_nom"]) && !empty($_POST["per_prenom"]) && !empty($_POST["per_age"])){

    }
}


?>
</body>
</html>
