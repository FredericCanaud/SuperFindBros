<!--
<script src="js/jquery-3.5.1.min.js"></script>
<script>
    function charger() {

        var lastMessage = $('#message_num:last').val(); // on récupère l'id du message le plus récent

        $.ajax({
            url: "?page=13?id=" + lastMessage,
            type: 'GET',
            data: {desti_num: $('#desti_num').val()},
            success: function (html) {
                $('#tchat').prepend(html);
            }
        });
    }

    setInterval(charger(), 5000);
</script>
-->
<h2 class="titre1"> Tchat </h2>
<div class="tchat" id="tchat">
    <?php
    $pdo = new Mypdo();
    $tchatManager = new TchatManager($pdo);
    $personneManager = new PersonneManager($pdo);
    $expediteur = $personneManager->getPersonneParId($_SESSION["userId"]);
    $destinataire = $personneManager->getPersonneParId($_POST["desti_num"]);
    if (!empty($_POST["message"])) {
        $tchatManager->addMessage($_SESSION["userId"], $_POST["desti_num"], $_POST["message"]);
    }
    /*
    if (!empty($_GET['id'])) {
        $id = (int)$_GET['id'];
        $nouveauxMessages = $tchatManager->getDernierMessage($_SESSION["userId"], $_POST["desti_num"], $_GET['id']);
        foreach ($nouveauxMessages as $message) {
            if ($message->getExpednum() == $_SESSION["userId"]) {
                ?>
                <div class="container">
                    <img src="img/profile/3.jpg" alt="Avatar" style="width:100%;">
                    <p><strong><?php echo $expediteur->getPerPseudo(); ?></strong>
                        : <?php echo $message->getMessage(); ?></p>
                    <span class="time-right"><?php echo $message->getDate(); ?></span>
                </div>
                <?php
            } else {
                ?>
                <div class="container darker">
                    <input type="hidden" id="message_num" value="<?php echo $message->getMessageNum(); ?>">
                    <img src="img/profile/2.jpg" alt="Avatar" class="right" style="width:100%;">
                    <p><strong><?php echo $destinataire->getPerPseudo(); ?></strong>
                        : <?php echo $message->getMessage(); ?></p>
                    <span class="time-left"><?php echo $message->getDate(); ?></span>
                </div>
                <?php
            }
        }
    } else {
    */
    $conversation = $tchatManager->getConversation($_SESSION["userId"], $_POST["desti_num"]);
    foreach ($conversation as $message) {
        if ($message->getExpednum() == $_SESSION["userId"]) {
            ?>
            <div class="container">
                <img src="img/profile/3.jpg" alt="Avatar" style="width:100%;">
                <p><strong><?php echo $expediteur->getPerPseudo(); ?></strong> : <?php echo $message->getMessage(); ?>
                </p>
                <span class="time-right"><?php echo $message->getDate(); ?></span>
            </div>
            <?php
        } else {
            ?>
            <div class="container darker">
                <input type="hidden" id="message_num" value="<?php echo $message->getMessageNum(); ?>">
                <img src="img/profile/2.jpg" alt="Avatar" class="right" style="width:100%;">
                <p><strong><?php echo $destinataire->getPerPseudo(); ?></strong> : <?php echo $message->getMessage(); ?>
                </p>
                <span class="time-left"><?php echo $message->getDate(); ?></span>
            </div>
            <?php
        }
    }
    ?>
    <div class="tchat" id="nouveauxMessages">

    </div>
    <form method="post" action="./?page=13">
        <input type="hidden" name="desti_num" id="desti_num" value="<?php echo $_POST["desti_num"] ?>">
        <label for="message"> Votre message </label>
        <textarea rows="1" id="message" name="message"> </textarea>
        <input type="submit" value="Envoyer" class="messageB">
    </form>

</div>