<section class="footer">

    <div class="logo"><img src="img/logo.png"></div>
    <div class="menu-footer">
        <?php
            if ((empty($_GET["page"])) || ($_GET["page"]==0)){
                echo('<a href="#accueil">Accueil</a>');
            }else{
                echo('<a href="./?page=0">Accueil</a>');
            }
        ?>


        <a href="#">Politique de confidentialité</a>
        <a href="#">Facebook</a>
        <a href="#">Twitter</a>

    </div>

    <div class="copyright">© 2020. Tous droits réservés Thomas Campredon - Frédéric Canaud</div>

</section>


<?php
    if ($_SESSION['userId'] != -1){
?>
    <style>
        .footer{
            position: absolute;
            bottom:0px;
        }
    </style>

<?php
    }

?>
