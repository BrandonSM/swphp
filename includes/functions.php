<?php 
    // Check if the Expected Ship Date is valid
    function checkIsValidDate($dateString) {
        return (bool)strtotime($dateString);
    }

    // Format the Expected Ship Date
    function formatShipDate($dateString) {
        $formattedShipDate = date("Y-m-d", strtotime($dateString)); 
        return $formattedShipDate;
    }

    // Format the Comment and extract the Ship Date
    function formatComment($comment) {
        $expectedDate = substr($comment, strpos($comment,":")+1,9);
        if(checkIsValidDate($expectedDate)) {
            $strReplaced = str_replace("Expected Ship Date:" . $expectedDate, "", $comment);
            echo $strReplaced . "<br/><br/><em>Expected Date: " . formatShipDate($expectedDate) . "</em>";
        } else {
            echo $comment;
        }
    }

    
    function updateShipDateField ($order, $dateString) {
        $formattedShipDate = formatShipDate($dateString);
        $updateSQL = "UPDATE comments SET shipdate_expected=" . $formattedShipDate . " WHERE orderid=" . $order;
    }

?>