<?php 
    // Check if the Expected Ship Date is valid
    function checkIsValidDate($dateString) {
        return (bool)strtotime($dateString);
    }

    // Extract and format the Expected Ship Date from the comment
    function formatShipDate($dateString) {
        $formattedShipDate = date("Y-m-d", strtotime($dateString)); 
        return $formattedShipDate;
    }

    // Format the Comment and extract the Ship Date
    function formatComment($comment) {
            return $strReplaced . "<br/><br/><em>Expected Ship Date: " . extractShipDate($comment) . "</em>";
        } else {
            return $comment;
        }
    }

    
    function updateShipDateField ($order, $dateString) {
        $formattedShipDate = formatShipDate($dateString);
        $updateSQL = "UPDATE comments SET shipdate_expected=" . $formattedShipDate . " WHERE orderid=" . $order;
    }

?>