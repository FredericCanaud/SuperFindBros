<h1>Deconnection</h1>

<p>Vous avez bien été déconnecté !</p>
<p> Redirection automatique dans 2 secondes </p>

<?php
$_SESSION['estConnecte']=0;
$_SESSION['userId']=-1;

header( "refresh:2;url=?page=0" );
?>