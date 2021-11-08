<?php
    date_default_timezone_set("Europe/Paris"); 
    $currentHour = time();
    echo 'Il est :  '. date('D d/m/Y H:i:s', $currentHour) ." à Paris.\n";
?>
