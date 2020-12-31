<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Super Find Bros.</title>

    <link rel="shortcut icon" href="../../img/favicon.png">

    <script type='text/javascript'>
        function check(input) {
            if (input.value !== document.getElementById('password').value) {
                input.setCustomValidity('Vos mots de passe ne se correspondent pas.');
            } else {
                input.setCustomValidity('');
            }
        }
    </script>
</head>

<body>

<div class="container">

    <!----------------------------- Accueil ----------------------------->

    <section class="accueil parallax-background" id="accueil">

        <div class="opacity"></div>
        <div class="content">
            <div class="text">

                <div class="logo"><img src="img/logo.png" alt="Logo"></div>

                <h1>Super Find Bros.</h1>
                <hr />
                <h2>Rencontrez les joueurs (et joueuses !) les plus attypiques de votre région</h2>

                <a href="#a-propos">
                    <div class="en-savoir-plus">En savoir plus</div>
                </a>

            </div>
            <div class="arrow-down"></div>
        </div>

    </section>

    <!----------------------------- Menu mobile ----------------------------->

    <section class="menu-media">

        <div class="menu-content">

            <div class="logo">SUPER FIND BROS.</div>

            <div class="icon"><a href="#"><img src="img/icons/menu-media.png" /></a></div>

        </div>

    </section>

    <ul class="menu-click">
        <a href="#accueil">
            <li href="#accueil">ACCUEIL</li>
        </a>
        <a href="#a-propos">
            <li href="#a-propos">A PROPOS</li>
        </a>
        <a href="#profile">
            <li href="#profile">PROFILS</li>
        </a>
        <a href="#inscription">
            <li href="#inscription">INSCRIPTION</li>
        </a>
        <a href="./?page=1">
            <li href="./?page=1">CONNEXION</li>
        </a>

    </ul>

    <!----------------------------- Menu ----------------------------->

    <section class="menu">

        <div class="menu-content">

            <div class="logo">SUPER FIND BROS.</div>

            <ul id="menu">
                <li><a href="#accueil">ACCUEIL</a></li>
                <li><a href="#about-us">A PROPOS</a></li>
                <li><a href="#profile">PROFILS</a></li>
                <li><a href="#inscription">INSCRIPTION</a></li>
                <li><a href="./?page=1">CONNEXION</a></li>
            </ul>
        </div>

    </section>

    <!----------------------------- A propos ----------------------------->

    <section class="about-us" id="a-propos">

        <div class="content">

            <h1>Qu'est ce que Super Find Bros ?</h1>
            <hr />

            <p class="title">Super Find Bros est un site de rencontre destiné à la communauté Geek !
                Ici les autres membres comprennent et partagent vos passions pour le jeu vidéo ! </p>
            <p class="title">N'ayez pas honte de mettre en avant vos différents jeux sur différentes plateformes.
                Affichez fièrement vos centres d'intérêt sur votre profil et faites la connaissance de personnes les partageant.
                Finis les début de conversations difficiles : engagez enfin la discussion sur des jeux qui vous passionnent ! </p>

            <h1>Les jeux tendances du moment</h1>
            <hr />

            <div class="column-one">

                <div class="circle-one"></div>

                <h2>SUPER SMASH BROS</h2>
                <p>Jeu de combat multijoueur, crossover des différents univers de Nintendo</p>

            </div>

            <div class="column-two">

                <div class="circle-two"></div>

                <h2>AMONG US</h2>
                <p>Chaque joueur incarne un des membres de l'équipage d'un vaisseau spatial, chacun pouvant être soit un équipier, soit un imposteur</p>

            </div>


            <div class="column-three">

                <div class="circle-three"></div>

                <h2>FALL GUYS</h2>
                <p>Jeu vidéo multijoueur fortement inspiré des jeux télévisés de course d'obstacles comme Takeshi Castle</p>

            </div>

        </div>

    </section>

    <div class="clear"></div>

    <!----------------------------- Profils ----------------------------->

    <section class="profile" id="profile">


        <div class="profile-margin">

            <h1>Rejoignez la communauté !</h1>
            <hr />

            <ul class="grid">
                <?php
                $pdo = new Mypdo();
                $personneManager = new PersonneManager($pdo);
                $personnes = $personneManager->getPersonnesAleatoires();
                foreach ($personnes as $personne) {
                    ?>
                    <li>
                        <a href="#">
                            <img src="img/profile/<?php echo $personne->getPerAvatar() ?>" alt="Caroline" class="imageProfil"/>
                            <div class="no-text">
                                <p style="color: white;"><?php echo $personne->getPerPseudo() ?></p>
                                <p class="description"><?php echo $personne->getPerAge() ?> ans</p>
                            </div>
                        </a>
                    </li>
                    <?php
                }
                ?>
        </div>

    </section>

    <div class="clear"></div>

    <!----------------------------- Formulaire inscription ----------------------------->

    <section class="inscription" id="inscription">
        <h1>Inscrivez-vous dès maintenant</h1>
        <hr />

        <div class="content">

            <div class="form">

                <form method="post" action="index.php?page=2">

                    <div class="column">
                        PSEUDO<br /><br />
                        <input type="text" id="pseudo" name="per_pseudo" value="" required/>
                    </div>

                    <div class="column-2">
                        E-MAIL<br /><br />
                        <input type="email" id="email" name="per_mail" value="" required/>
                    </div>

                    <div class="column-3">
                        MOT DE PASSE<br /><br />
                        <input type="password" id="password" name="per_mdp" value="" required />
                    </div>

                    <div class="column-4">
                        <label for="confirm">
                            CONFIRMER MOT DE PASSE
                        </label><br /><br />
                        <input type="password" id="confirm" value="" required oninput="check(this)"/>
                    </div>

                    <div class="button">
                        <span><input class="submit" id="submit" name="submit" type="submit" value="S'INSCRIRE"></span>
                    </div>

                </form>

            </div>


            <div class="inscription-text">

                Pour vous inscrire à la l'application, remplissez ce formulaire !<br /><br />

                En cliquant sur <strong> Envoyer </strong>, vous serez amené à la création de votre profil<br />
                (Nom, prénom, consoles possédées, jeux auxquels vous jouez...)<br /><br />

                Un <strong> mail de confirmation d'inscription </strong> vous sera envoyé à l'adresse mail mentionnée.

            </div>


        </div>

    </section>

    <!----------------------------- Footer ----------------------------->
    <!-- include/footer.inc.php-->


</div>

</body>

</html>