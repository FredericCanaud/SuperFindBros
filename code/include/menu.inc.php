<?php
if($_SESSION['estConnecte']==1){
?>
    <div id="navigation">
        <ul id="liste">
            <li><a href="./?page=0">ACCUEIL</a></li>
            <li><a href="./?page=3">PROFIL</a></li>
            <li><a href="./?page=6">AMIS</a></li>
            <li><a href="./?page=10">JEUX</a></li>
            <li><a href="./?page=8">GROUPE</a></li>
            <li><a href="./?page=1">DECONNEXION</a></li>
        </ul>
    </div>
<?php
}
?>
