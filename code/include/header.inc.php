<?php
    session_start();
    if (empty($_SESSION['estConnecte'])){
        $_SESSION['estConnecte']=0;
    }
    if (empty($_SESSION['userId'])) {
        $_SESSION['userId'] = -1;
    }
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
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/style-responsive.css" />
    <?php if ($_SESSION['estConnecte'] >=1 || ($_SESSION['estConnecte'] >=0 && $_GET["page"] == 1)){
        ?>
        <link rel="stylesheet" type="text/css" href="css/userPart.css" />
    <?php } ?>
    <link rel="shortcut icon" href="img/favicon.png">
</head>
<body>
<?php
    // si on est connecté
    if (($_SESSION['estConnecte']==1) || (!empty($_GET['page'])) || ($_SESSION['estConnecte']==2)){
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