

<p class="message">Vous avez bien été déconnecté !</p>
<p class="message"> Redirection automatique dans 2 secondes </p>

<?php
$_SESSION['estConnecte']=0;
$_SESSION['userId']=-1;


header( "refresh:2;url=?page=0" );
?>