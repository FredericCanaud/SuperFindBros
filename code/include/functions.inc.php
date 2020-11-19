<?php
    function getEnglishDate($date){
        $membres = explode('/', $date);
        $date = $membres[2].'-'.$membres[1].'-'.$membres[0];
        return $date;
    }

    function contains($tab,$mot){
        for ($i = 0 ; $i < count($tab) ; $i++){
            if (strcasecmp($tab[$i],$mot)==0){
                return 0;
            }
        }
        return 1;
    }

    function printC($msg){
        echo "<script>console.log(".json_encode($msg).")</script>";
    }
?>