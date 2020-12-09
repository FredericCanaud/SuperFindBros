<?php

if ((empty($_POST["mail"])) || (empty($_POST["mdp"]))){
?>
    <div class="carte">
        <br>
        <h1 class="titre">Connexion</h1>
        <br>
        <br>
        <div class="champs">
            <form method="post" action="#">
                <input type="text" class="intxt" name="mail" required placeholder="Adresse Mail">
                <br>
                <input type="password" class="intxt" name="mdp" required placeholder="Mot de passe">
                <br>
                <input type="submit" class="validationBouton" value="Connection">
            </form>
        </div>
    </div>

<?php
}else{
    $pdo=new Mypdo();
    $personneManager = new PersonneManager($pdo);

    $salt = "48@!alsd";
    $pwd = $_POST["mdp"];

    $mdpVerif = sha1(sha1($pwd).$salt);

    // le mdp de Bob@gmail.com est lemdp

    $mdp = $personneManager->getMdpParMail($_POST["mail"]);

    if ($mdp){
        if ($mdpVerif == $mdp){
            $_SESSION["estConnecte"] = 1;
            $_SESSION['userId'] = $personneManager->getIdParMail($_POST["mail"]);
            header( "refresh:2;url=?page=0" );
?>
        <p class="message"> Redirection automatique dans 2 secondes </p>
<?php
        }else{
            header( "refresh:0;url=?page=1" );
        }
    }else{
        header( "refresh:0;url=?page=1" );
    }
}
?>
