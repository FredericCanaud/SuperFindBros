<!--ici la page où le joueur peut voir et modifier son profil-->
<?php
    $pdo = new MyPDO();
    $amiManager = new AmiManager($pdo);
    $amis = $amiManager->getAmis($_SESSION['userId']);
?>


<h2 class="titre1">Profil</h2>

<div id="profil">
    <div id="gauche">
        <h3> Amis </h3>

        <?php

        foreach ($amis as $ami){
            $per_num=$ami->getPerNum();
        ?>
            <div class="bandeAmi">
                <p><?php echo $ami->getPerPrenom()." ".$ami->getPerNom()." ".$ami->getPerPseudo() ;?></p>
            </div>

        <?php
        }
        ?>
        <br>
        <br>
        <input type="button" class="validationBouton" value="gérer" onClick="window.location = './?page=8'">
    </div>
    <div id="milieu">
        <h3> Informations </h3>

    </div>
    <div id="droite">
        <h3> Jeux </h3>

    </div>
</div>
<br>
<br>
<br>
