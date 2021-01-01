<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/userPart.css" />
</head>
<h1>Accueil</h1>

<div class="profile-margin">


        <?php
        $pdo = new Mypdo();
        $possedeManager = new PossedeManager($pdo);
        $jeuManager = new JeuManager(($pdo));
        $personneManager = new PersonneManager(($pdo));

        $jeux = $jeuManager->getJeuxFromPersonne($_SESSION["userId"]);
        foreach ($jeux as $jeu){

            $personnes = $personneManager->getPersonnesByJeu($jeu->getJeuNum(), $_SESSION["userId"]);
            ?>
            <div class="jeuPersonnes">
                <img src="img/jeux/<?php echo $jeu->getJeuImage() ?>" alt="<?php echo $jeu->getJeuNom() ?>" style="width:100%;">
                <h2>Personnes jouant à <?php echo $jeu->getJeuNom() ?></h2>
            </div>
            <ul class="grid">
            <?php
            foreach ($personnes as $personne) {
                ?>
                <li>
                    <a>
                        <img src="img/profile/<?php echo $personne->getPerAvatar() ?>" alt="<?php echo $personne->getPerPseudo() ?>" class="imageProfil"/>
                        <div class="no-text">
                            <p style="color: white;"><?php echo $personne->getPerPseudo() ?></p>
                            <p class="description"><?php echo $personne->getPerAge() ?> ans</p>
                        </div>
                    </a>
                </li>
            <?php } ?>
        </ul>
        <?php } ?>

</div>