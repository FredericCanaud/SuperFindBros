<?php
    session_start();
    if (empty($_SESSION['estConnecte'])){
        $_SESSION['estConnecte']=0;
    }
    /*if (empty($_SESSION['userId'])){
        $_SESSION['userId']=-1;
    }
    if (empty($_SESSION['etu'])){
        $_SESSION['etu']=false;
    }*/

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <?php
    // $title = "A definire";
    ?>
    <!--<title>
        <?php //echo $title ?>
    </title> -->
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/style-responsive.css" />
    <link rel="stylesheet" type="text/css" href="css/userPart.css" />

</head>
<body>
<?php
    // si on est pas à la page d'accueil
    if ($_GET['page']!=0){
?>
    <div id="headerConnect">
        <div id="bandeLogo">
            <div id="logoSFB">
                <img src="../img/logo2.png" alt="logo2.png">
            </div>
        </div>
<?php
    }
    // si on est connecté
    if($_SESSION['estConnecte']==1){
?>
        <div id="navigation">
            <ul id="liste">
                <li><a href="./?page=0">ACCUEIL</a></li>
                <li><a href="#about-us">A PROPOS</a></li>
                <li><a href="#profile">PROFILS</a></li>
                <li><a href="#inscription">INSCRIPTION</a></li>
                <li><a href="./?page=1">CONNEXION</a></li>
            </ul>
        </div>
<?php
   }
?>
    </div>


</body>
</html>