<?php
    session_start();
    if (empty($_SESSION['estConnecte'])){
        $_SESSION['estConnecte']=0;
    }
    if (empty($_SESSION['userId'])){
        $_SESSION['userId']=-1;
    }
    /*
    if (empty($_SESSION['etu'])){
        $_SESSION['etu']=false;
    }*/

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <?php
     $title = "Super Find Bros.";
    ?>
    <title>
        <?php echo $title ?>
    </title>
    <link rel="stylesheet" type="text/css" href="../css/reset.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/style-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../css/userPart.css" />

    <link rel="shortcut icon" href="img/favicon.png">

</head>
<body>
<?php
    // si on est connecté
    if (($_SESSION['estConnecte']==1) || (!empty($_GET['page']))){
?>
    <div id="headerConnect">
        <div id="bandeLogo">
            <div id="logoSFB">
                <img src="img/logo2.png" alt="logo2.png">
            </div>
        </div>
    </div>
<?php
    }
?>

</body>
</html>