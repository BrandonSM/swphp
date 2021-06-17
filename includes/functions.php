<?php 
    // Check if the Expected Ship Date is valid
    function checkIsValidDate($dateString) {
        return (bool)strtotime($dateString);
    }

    // Extract and format the Expected Ship Date from the comment
    function extractShipDate($comment) {
        $string = 'Expected Ship Date: ';
        if (strripos($comment,$string)) {
            $expectedDate = substr($comment, strripos($comment,$string)+strlen($string),8);
            if(checkIsValidDate($expectedDate)) {
                return $expectedDate;
            }
        }
    }

    // Format the Expected Ship Date for the database
    function formatShipDate($dateString) {
        $formattedShipDate = date("Y-m-d H:i:s", strtotime($dateString)); 
        return $formattedShipDate;
    }

    // Format the Comment and extract the Ship Date
    function formatComment($comment) {
        $expectedDate = extractShipDate($comment);
        if(checkIsValidDate($expectedDate) !== false) {
            $strReplaced = str_replace("Expected Ship Date: " . $expectedDate, "", $comment);
            return $strReplaced . "<br/><br/><em>Expected Ship Date: " . extractShipDate($comment) . "</em>";
        } else {
            return $comment;
        }
    }

    // Update the shipdate_expected field in the database with Expected Ship Date from the comment
    function updateExpectedShipDateField($conn, $orderid, $comment) {
        $formattedShipDate = formatShipDate(extractShipDate($comment));
        $updateSQL = "UPDATE sweetwater_test SET shipdate_expected='" . $formattedShipDate . "' WHERE orderid=" . $orderid;
        if ($conn->query($updateSQL) === true) {
            echo "Record updated successfully";
          } else {
            echo "Error updating record: " . $conn->error;
          }
    }

?>