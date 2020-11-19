<?php
if($_SESSION['estConnecte']==1){
?>
    <div id="navigation">
        <ul id="liste">
            <li><a href="./?page=0">ACCUEIL</a></li>
            <li><a href="#about-us">A PROPOS</a></li>
            <li><a href="#profile">PROFILS</a></li>
            <li><a href="#inscription">INSCRIPTION</a></li>
            <li><a href="./?page=1">DECONNEXION</a></li>
        </ul>
    </div>
<?php
}
?>
