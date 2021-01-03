<!--ici la page où le joueur peut voir et modifier son profil-->
<?php
$pdo = new MyPDO();

if ($_SESSION["estConnecte"] == 1) { ?>
    <h2 class="titre1">Profil</h2>

    <div id="profil">
        <div id="gauche">
            <h3> Amis </h3>
            <?php
            $amiManager = new AmiManager($pdo);
            $amis = $amiManager->getAmis($_SESSION['userId']);
            $personneManager = new PersonneManager($pdo);
            foreach ($amis as $ami) {
                $per_num = $ami->getPerNum();
                ?>
                <div class="bandeAmi">
                    <p><?php echo $ami->getPerPrenom() . " " . $ami->getPerNom() . " " . $ami->getPerPseudo(); ?></p>
                </div>

            <?php } ?>
            <br>
            <br>
            <input type="button" class="validationBouton" value="Gérer" onClick="window.location = './?page=8'">
        </div>
        <div id="milieu">
            <h3> Informations </h3>
            <?php
            $moi = $personneManager->getPersonneParId($_SESSION['userId']);
            ?>
            <br>
            <br>
            <table class="tableArrange">
                <tr>
                    <td>
                        <pre>Votre nom :</pre>
                    </td>
                    <td>
                        <pre><?php echo "     " . $moi->getPerNom(); ?></pre>
                    </td>
                </tr>
                <tr>
                    <td>
                        <pre>Votre prénom :</pre>
                    </td>
                    <td>
                        <pre><?php echo "     " . $moi->getPerPrenom(); ?></pre>
                    </td>
                </tr>
                <tr>
                    <td>
                        <pre>Votre pseudo :</pre>
                    </td>
                    <td>
                        <pre><?php echo "     " . $moi->getPerPseudo(); ?></pre>
                    </td>
                </tr>
                <tr>
                    <td>
                        <pre>Votre age :</pre>
                    </td>
                    <td>
                        <pre><?php echo "     " . $moi->getPerAge() . " ans"; ?></pre>
                    </td>
                </tr>
                <tr>
                    <td>
                        <pre>Votre mail :</pre>
                    </td>
                    <td>
                        <pre><?php echo "     " . $moi->getPerMail(); ?></pre>
                    </td>
                </tr>
            </table>
            <input type="button" class="validationBouton" value="Éditer" onClick="window.location = './?page=4'">
        </div>
        <div id="droite">
            <h3> Jeux </h3>

        </div>
    </div>
<?php } else if ($_SESSION["estConnecte"] == 2) { ?>
    <div id="admin">
        <?php $personneManager = new PersonneManager($pdo);

        if (isset($_POST["per_num"])) {
            $appartientManager = new AppartientManager($pdo);
            $amiManager = new AmiManager($pdo);
            $possedeManager = new PossedeManager($pdo);

            $appartientManager->supprimerPersonne($_POST["per_num"]);
            $amiManager->supprimerPersonne($_POST["per_num"]);
            $possedeManager->supprimerPersonne($_POST["per_num"]);
            $personneManager->supprimerPersonne($_POST["per_num"]);
            ?>
            <p class="valid"> La personne a bien été supprimée !</p>
            <?php
        }
        $personnes = $personneManager->getAllPersonnes();
        ?>
        <h1>Liste des profils</h1>
        <h2> Actuellement <?php echo count($personnes); ?> personne(s) sont enregistrées </h2>
        <table class="tableArrange">
            <tr>
                <th>Avatar</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Pseudo</th>
                <th>Age</th>
                <th>Mail</th>
                <th></th>
            </tr>
            <?php foreach ($personnes as $personne) { ?>
                <form method="post" action="./?page=5">
                    <tr>
                        <td>
                            <img src="img/profile/<?php echo $personne->getPerAvatar(); ?>"
                                 alt="<?php echo $personne->getPerNom(); ?>">
                        </td>
                        <td>
                            <?php echo $personne->getPerNom(); ?>
                        </td>
                        <td>
                            <?php echo $personne->getPerPrenom(); ?>
                        </td>
                        <td>
                            <?php echo $personne->getPerPseudo(); ?>
                        </td>
                        <td>
                            <?php echo $personne->getPerAge(); ?>
                        </td>
                        <td>
                            <?php echo $personne->getPerMail(); ?>
                        </td>
                        <td>
                            <input type="hidden" name="per_num" value="<?php echo $personne->getPerNum(); ?>">
                            <input type="submit" class="deleteB" value="Supprimer"/>
                        </td>
                    </tr>
                </form>
            <?php } ?>
        </table>
    </div>
<?php } ?>


