<?php
if($_SESSION['estConnecte']==1 || $_SESSION['estConnecte']==2){
?>
    <div id="navigation">
        <ul id="liste">
            <li><a href="./?page=0">ACCUEIL</a></li>
            <li><a href="./?page=5">PROFIL</a></li>
            <?php if($_SESSION['estConnecte']==1){ ?>
                <li><a href="./?page=8">AMIS</a></li>
            <?php } ?>
            <li><a href="./?page=12">JEUX</a></li>
            <li><a href="./?page=10">GROUPE</a></li>
            <li><a href="./?page=1">DECONNEXION</a></li>
        </ul>
    </div>
<?php
}
?>
