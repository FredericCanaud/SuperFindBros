<?php
    // Paramétres de l'application SuperFindBros
    // A modifier en fonction de la configuration

    define('DBHOST', "localhost");
    define('DBNAME', "super_find_bros");
    define('DBUSER', "bd");
    define('DBPASSWD', "bede");
    define('ENV','dev');

    // pour un environememnt de production remplacer 'dev' (développement) par 'prod' (production)
    // les messages d'erreur du SGBD s'affichent dans l'environememnt dev mais pas en prod
?>