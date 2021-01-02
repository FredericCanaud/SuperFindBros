<h1>Vos jeux </h1>
<div class="afficherJeu">

<?php
    $pdo = new Mypdo();
    if (isset($_POST["ajout"])){
        $possedeManager = new PossedeManager($pdo);
        $possedeManager->ajouterJeuPersonne($_SESSION["userId"],$_POST["ajout"]);
        ?>
        <p class="valid"> Le jeu a bien été ajouté !</p>
        <?php
    } else if(isset($_POST["modif"])){
        $possedeManager = new PossedeManager($pdo);
        $possedeManager->modifierHeuresDeJeu($_SESSION["userId"],$_POST["modif"],$_POST["tempsdejeumoyen"]);
        ?>
        <p class="valid"> Votre modification a été effectuée !</p>
        <?php
    }
    $jeuManager = new JeuManager($pdo);
    $jeux = $jeuManager->afficherJeux($_SESSION["userId"]);
    $jeuxNonPossedes = $jeuManager->afficherJeuxNonPossedes($_SESSION["userId"]);
    ?>
    <h2 class="titre1">Voici les jeux que vous possédez</h2>
    <table class="tableArrange">
        <tr>
            <th>Nom</th>
            <th>Temps de jeu</th>
            <th></th>
        </tr>
        <?php
        foreach($jeux as $jeu){
        ?>
        <form method="post" action="./?page=12">
            <tr>
                <td>
                    <div class="jeux">
                        <img src="img/jeux/<?php echo $jeu["jeu_image"] ?>" alt="<?php echo $jeu["jeu_nom"] ?>">
                        <p><?php echo $jeu["jeu_nom"];?></p>
                    </div>
                </td>
                <td>
                    <input type="number" name="tempsdejeumoyen" value="<?php echo $jeu["tempsdejeumoyen"]; ?>"> heure(s)
                </td>
                <td>
                    <input type="hidden" name="modif" value="<?php echo $jeu["jeu_num"] ?>">
                    <input type="submit" class="tchatB" value="Modifier"/>
                </td>
            </tr>
        </form>

        <?php } ?>
    </table>
</div>
<div class="afficherJeuNonPossedes">
    <h2 class="titre1">Ajoutez de nouveaux jeux à votre collection ;)</h2>
    <table class="tableArrange">
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Annee</th>
            <th>Editeur</th>
            <th></th>
        </tr>
        <?php
        foreach($jeuxNonPossedes as $jeu){
            ?>
            <form method="post" action="./?page=12">
                <tr>
                    <td>
                        <div class="jeux">
                            <img src="img/jeux/<?php echo $jeu->getJeuImage(); ?>" alt="<?php echo $jeu->getJeuNom(); ?>">
                            <p><?php echo $jeu->getJeuNom();?></p>
                        </div>
                    </td>
                    <td>
                        <p><?php echo $jeu->getJeuDescription();?></p>
                    </td>
                    <td>
                        <p><?php echo $jeu->getJeuAnnee();?></p>
                    </td>
                    <td>
                        <p><?php echo $jeu->getJeuEditeur();?></p>
                    </td>
                    <td>
                        <input type="hidden" name="ajout" value="<?php echo $jeu->getJeuNum(); ?>">
                        <input type="submit" class="tchatB" value="Ajouter"/>
                    </td>
                </tr>
            </form>

        <?php } ?>
    </table>
</div>


