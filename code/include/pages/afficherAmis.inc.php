<h2 class="titre1">Vos amis </h2>


<div id="rechercheAmi">
    <a href="./?page=7">Ajouter un ami</a>
</div>
<div id="listeAmis">

    <?php
        $pdo=new Mypdo();
        $amiManager = new AmiManager($pdo);
        $listeAmis = $amiManager->getAmis($_SESSION['userId']);

        if(empty($_GET['id'])){
    ?>

    <table id="tableAmi">
        <colgroup>
            <col span="1" style="width: 10%;">
            <col span="1" style="width: 30%;">
            <col span="1" style="width: 30%;">
        </colgroup>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Pseudo</th>
            <th></th>
        </tr>
        <?php

            foreach ($listeAmis as $ami){
                $per_num=$ami->getPerNum();
        ?>
                <tr>
                    <td><?php echo $ami->getPerNom();?></td>
                    <td><?php echo $ami->getPerPrenom();?></td>
                    <td><?php echo $ami->getPerPseudo();?></td>
                    <td>
                        <form method="post" action="./?page=13">
                            <input type="hidden" name="desti_num" value="<?php echo $ami->getPerNum(); ?>">
                            <input type="submit" class="tchatB" value="Tchat"/>
                        </form>
                    </td>
                    <td><a href="<?php echo "./?page=8&id=".$ami->getPerNum(); ?>" class="deleteB">Supprimer</a></td>
                </tr>
        <?php
            }
        }else{
            $amiManager->supprimer($_SESSION['userId'], $_GET['id']);
        ?>

            <p class="message">Ami supprimé</p>

        <?php
            header( "refresh:2;url=?page=8" );
        }
        ?>
    </table>
</div>