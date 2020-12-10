<!-- ici on peut modifier son profil -->

<?php
    $pdo = new MyPDO();
    $personneManager = new PersonneManager($pdo);
    $moi = $personneManager->getPersonneParId($_SESSION['userId']);
?>
<h2 class="titre1">Modifier mon profil</h2>


<?php
if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['pseudo']) || empty($_POST['age']) || empty($_POST['mail'])){
?>
    <script>

    </script>
    <div class="formulaire">
        <form method="post" action="#">
            <table class="tableArrange">
                <tr>
                    <td>
                        <pre>Votre nom :</pre>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $moi->getPerNom();?>" name="nom" class="textin">
                    </td>
                </tr>
                <tr>
                    <td>
                        <pre>Votre prénom :          </pre>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $moi->getPerPrenom();?>" name="prenom" class="textin">
                    </td>
                </tr>
                <tr>
                    <td>
                        <pre>Votre pseudo :</pre>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $moi->getPerPseudo();?>" name="pseudo" class="textin">
                    </td>
                </tr>
                <tr>
                    <td>
                        <pre>Votre age :</pre>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $moi->getPerAge();?>" name="age" class="textin">
                    </td>
                </tr>
                <tr>
                    <td>
                        <pre>Votre mail :</pre>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $moi->getPerMail();?>" name="mail" class="textin"">
                    </td>
                </tr>
                <tr>
                    <td>
                        <pre>Votre mdp :</pre>
                    </td>
                    <td>
                        <input type="password" placeholder="Mot de passe" name="mdp" class="textin">
                    </td>
                </tr>
            </table>
            <input type="submit" class="validationBouton" value="modifier le profil">
        </form>
    </div>

<?php
}else{
    $id = $_SESSION['userId'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $age = $_POST['age'];
    $mail = $_POST['mail'];
    $mdp = "";

    if (empty($_POST['mdp'])){
        $mdp = -1;
    }else{
        $mdp = $_POST['mdp'];
    }

    $personneManager->updatePersonne($id, $nom, $prenom, $pseudo, $age, $mail, $mdp);
?>

    <p class="message">Votre profil a bien été modifié</p>


<?php
    header( "refresh:2;url=?page=5" );
}
?>





























