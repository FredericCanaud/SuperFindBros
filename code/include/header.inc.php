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

</head>
<body>
</body>
