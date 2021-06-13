<?php require_once ('./includes/header.php'); ?>
<h1>Sweetwater Comments Report</h1>

<?php
    // Set the queries for the report
    echo "<h2>CANDY</h2>";
    $qCommentsForCandy = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%candy%'";
    $resCandyComments = $conn->query($qCommentsForCandy);
    if($resCandyComments->num_rows > 0) {

        while($candyComment = $resCandyComments->fetch_assoc()) {
            $dateExploded = explode("Expected Ship Date: ", $candyComment["comments"]);
            if(isset($dateExploded[1])) {
                $newDate = date("Y-m-d", strtotime($dateExploded[1])); 
                $strReplaced = str_replace("Expected Ship Date: " . $dateExploded[1], "", $candyComment["comments"]);
                echo "orderid: " . $candyComment["orderid"]. " - Comment: " . $strReplaced . " - Expected Date: " . $newDate . "<br>";
            } else {
                echo "orderid: " . $candyComment["orderid"] . " - Comment: " . $candyComment["comments"] . "<br>";
            }
        }

    } else {
        echo "0 results";
    }

    echo "<h2>CALL ME</h2>";
    // Set the queries for the report
    $qCommentsForCall = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%call me%' AND `comments` NOT LIKE '%Do not call%' AND `comments` NOT LIKE '%don%t call%' ORDER BY `orderid` ASC";
    $resCallComments = $conn->query($qCommentsForCall);
    if($resCallComments->num_rows > 0) {

        while($callComment = $resCallComments->fetch_assoc()) {
            echo "orderid: " . $callComment["orderid"]. " - Comment " . $callComment["comments"] . "<br>";
        }

    } else {
        echo "0 results";
    }

    echo "<h2>DONT CALL ME</h2>";
    // Set the queries for the report
    $qCommentsForDontCall= "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%don%t call me%' OR `comments` LIKE '%Do not call%'";
    $resDontCallComments = $conn->query($qCommentsForDontCall);
    if($resDontCallComments->num_rows > 0) {

        while($dontCallComment = $resDontCallComments->fetch_assoc()) {
            echo "orderid: " . $dontCallComment["orderid"]. " - Comment " . $dontCallComment["comments"] . "<br>";
        }

    } else {
        echo "0 results";
    }

    echo "<h2>WHO REFERRED ME</h2>";
    // Set the queries for the report
    $qCommentsForRefered = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%referred me%'";
    $resReferredComments = $conn->query($qCommentsForRefered);
    if($resReferredComments->num_rows > 0) {

        while($referredComment = $resReferredComments->fetch_assoc()) {
            echo "orderid: " . $referredComment["orderid"]. " - Comment " . $referredComment["comments"] . "<br>";
        }

    } else {
        echo "0 results";
    }

    echo "<h2>SIGNATURE REQUIREMENTS</h2>";
    // Set the queries for the report
    $qCommentsForSignature = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%signature%'";
    $resSignatureComments = $conn->query($qCommentsForSignature);
    if($resSignatureComments->num_rows > 0) {

        while($signatureComment = $resSignatureComments->fetch_assoc()) {
            echo "orderid: " . $signatureComment["orderid"]. " - Comment " . $signatureComment["comments"] . "<br>";
        }

    } else {
        echo "0 results";
    }

    echo "<h2>EVERYTHING ELSE</h2>";
    // Set the queries for the report
    $qCommentsEverythingElse = "SELECT * FROM `sweetwater_test` WHERE `comments` NOT LIKE '%candy%' AND `comments` NOT LIKE '%call%' AND `comments` NOT LIKE '%signature%' AND `comments` NOT LIKE '%referred%'";
    $resEverythingElse = $conn->query($qCommentsEverythingElse);
    if($resEverythingElse->num_rows > 0) {

        while($otherComment = $resEverythingElse->fetch_assoc()) {
            echo "orderid: " . $otherComment["orderid"]. " - Comment " . $otherComment["comments"] . "<br>";
        }

    } else {
        echo "0 results";
    }
?>
<?php require_once ('./includes/footer.php'); ?>