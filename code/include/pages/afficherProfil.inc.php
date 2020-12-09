<!--ici la page où le joueur peut voir et modifier son profil-->
<?php
    $pdo = new MyPDO();
    $amiManager = new AmiManager($pdo);
    $amis = $amiManager->getAmis($_SESSION['userId']);
    $personneManager = new PersonneManager($pdo);
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
        <?php
        $moi = $personneManager->getPersonneParId($_SESSION['userId']);
        ?>
        <br>
        <br>
        <table>
            <tr>
                <td>
                    <pre>Votre nom :</pre>
                </td>
                <td>
                    <pre><?php echo "     ".$moi->getPerNom();?></pre>
                </td>
            </tr>
            <tr>
                <td>
                    <pre>Votre prénom :</pre>
                </td>
                <td>
                    <pre><?php echo "     ".$moi->getPerPrenom();?></pre>
                </td>
            </tr>
            <tr>
                <td>
                    <pre>Votre pseudo :</pre>
                </td>
                <td>
                    <pre><?php echo "     ".$moi->getPerPseudo();?></pre>
                </td>
            </tr>
            <tr>
                <td>
                    <pre>Votre age :</pre>
                </td>
                <td>
                    <pre><?php echo "     ".$moi->getPerAge()." ans";?></pre>
                </td>
            </tr>
            <tr>
                <td>
                    <pre>Votre mail :</pre>
                </td>
                <td>
                    <pre><?php echo "     ".$moi->getPerMail()." ans";?></pre>
                </td>
            </tr>
        </table>
        <input type="button" class="validationBouton" value="éditer" onClick="window.location = './?page=5'">
    </div>
    <div id="droite">
        <h3> Jeux </h3>

    </div>
</div>
<br>
<br>
<br>
