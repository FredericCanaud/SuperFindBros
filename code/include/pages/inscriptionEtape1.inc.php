<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/inscription.css" />
</head>
<body>

<?php
if(empty($_POST["per_pseudo"]) || empty($_POST["per_mail"]) || empty($_POST["per_mdp"])){
    header("refresh:2;url=index.php");
    ?>
    <p class="error"> Vous tentez d'accéder cette page de la mauvaise façon ! </p>
    <p class="error"> Redirection automatique dans 2 secondes... </p>
    <?php
} else{
    if (empty($_POST["per_nom"]) || empty($_POST["per_prenom"]) || empty($_POST["per_age"])){
        $_SESSION["brow"] = array(
            "per_pseudo" => $_POST["per_pseudo"],
            "per_mail" => $_POST["per_mail"],
            "per_mdp" => $_POST["per_mdp"],
        );
        ?>
    <div class="carte">
        <form action="index.php?page=3" id="insert" method="post" enctype="multipart/form-data">
            <h1> Bienvenue dans Super Find Bros ! </h1>
            <h2> Avant d'accéder à l'application, nous avons
            besoin de quelques informations supplémentaires pour complémenter votre profil ;)</h2>
            <table>
                <tr>
                   <td>
                       <label>Prénom</label>
                   </td>
                   <td>
                       <input type="text" name="per_prenom" id="per_prenom" size="10" required> <br>
                   </td>
                </tr>
                <tr>
                    <td>
                        <label>Nom</label>
                    </td>
                    <td>
                        <input type="text" name="per_nom" id="per_nom" size="10" required> <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Age</label>
                    </td>
                    <td>
                        <input type="number" name="per_age" id="per_age" size="10" required> <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Avatar</label>
                    </td>
                    <td>
                        <input type="file" name="per_avatar" accept="image/*"> <br>
                    </td>
                </tr>
            </table>

            <input type="submit" value="Valider"/>
        </form>
        <br />
    </div>
        <?php
    }
    else if(!empty($_POST["per_nom"]) && !empty($_POST["per_prenom"]) && !empty($_POST["per_age"])){

    }
}


?>
</body>
</html>
