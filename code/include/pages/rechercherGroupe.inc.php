<!-- ici la page qui permet de rechercher et de rejoindre un groupe selon des critères comme un jeu ou une moyenne d'age(lol)-->

<?php
$pdo = new MyPDO();
$groupeManager = new GroupeManager($pdo);
$mesGroupes = $groupeManager->getGroupeParIdPersonne($_SESSION['userId']);
?>

<h3 class="titre1">Rechercher des groupes</h3>

<div id="groupe">
    <div id="vosGroupes">
        <h3>Mes groupes</h3>
        <br>
        <table>
            <colgroup>
                <col span="1" style="width: 10%;">
                <col span="1" style="width: 10%;">
            </colgroup>


        <?php
        foreach ($mesGroupes as $groupe){
            $idGroupe = $groupe->getGrpNum();
        ?>
            <tr>
                <td>
                    <?php echo $groupe->getGrpNom() ;?>
                </td>
                <td>
                    <a href="./?page=6&idGroupe=<?php echo $groupe->getGrpNum() ;?>"> détails </a>
                </td>
            </tr>

        <?php
        }
        ?>
        </table>
    </div>
    <div id="rechercherGroupe">
        <p class="message">oui</p>
    </div>
    <div id="actionsGroupe">
        <a href="./?page=9">créer groupe</a>
    </div>
</div>