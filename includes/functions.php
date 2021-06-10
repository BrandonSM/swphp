<?php 

    // Convert the Expected Shipping Date
    function convertDate($date) {
        $date = new DateTime($date);
        echo $date->format('YY-MM-DD');
    }

?>