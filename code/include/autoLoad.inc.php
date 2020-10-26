<?php
    spl_autoload_register(
        function ($className) {
            $repClasses='classes/';
            //echo $repClasses.$className.'.class.php';
            require $repClasses.$className.'.class.php';
        }
    );
?>