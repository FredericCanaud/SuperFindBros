
<!-- ici la page qui permet d'ajouter un ami grace à son pseudo -->


<h2 class="titre1"> Ajouter un ami </h2>

<?php
    $pdo = new MyPDO();
    $personneManager= new PersonneManager($pdo);
    $amiManager = new AmiManager($pdo);

    if (empty($_POST['pseudoAmi'])) {

?>

        <div class="formulaire">
            <form method="post" action="./?page=7">
                <label>
                    Saisissez le pseudo de votre ami
                </label>
                <br>
                <br>
                <input type="text" name="pseudoAmi">
                <br>
                <input type="submit" value="Ajouter" class="validationBouton">
            </form>
        </div>

<?php
    }else{
        $idAmi = $personneManager->getIdParPseudo($_POST['pseudoAmi']);
        $idMoi = $_SESSION['userId'];
        if (($idAmi == -1) || ($idAmi==$idMoi)){
?>
            <div class="formulaire">
                <form method="post" action="./?page=7">
                    <label>
                        Le précédent pseudo n'existe pas, ressaisissez le pseudo de votre ami
                        </label>
                    <br>
                    <br>
                    <input type="text" name="pseudoAmi">
                    <br>
                    <input type="submit" value="Ajouter" class="validationBouton">
                </form>
            </div>


<?php
        }else{
            $amiManager->ajouter($_SESSION['userId'], $idAmi);
            $ami = $personneManager->getPersonneParId($idAmi);
?>
            <p class="message"><?php echo $ami->getPerPrenom()." ".$ami->getPerNom()." dit ".$ami->getPerPseudo()." ";?> vient de rejoindre vos amis</p>

<?php
            header("refresh:2;url=?page=8");
        }
    }
?>
