<?php require_once ('./includes/header.php'); ?>
<?php require_once ('./includes/functions.php'); ?>
<h1>Sweetwater Comments Report</h1>
<h2 class="my-4">Candy Comments (<a href="#top">back to top</a>)</h2>
    <?php
        $candyTerms = [
            'candy',
            'tootsie',
            'smarties'
        ];
        $qCommentsForCandy = "SELECT * FROM `sweetwater_test` WHERE `comments` REGEXP '(" . implode("|",$candyTerms) . ")'";
        $resCandyComments = $conn->query($qCommentsForCandy);
        if($resCandyComments->num_rows > 0) {

            while($candyComment = $resCandyComments->fetch_assoc()) { 
                if ($candyComment["shipdate_expected"] == '0000-00-00 00:00:00') {
                    $expectedShipDate = extractShipDate($candyComment["comments"]);
                    if(checkIsValidDate($expectedShipDate)) {
                        updateExpectedShipDateField($conn,$candyComment["orderid"],$candyComment["comments"]);
                    }
                }  
                ?>
                <div class="card"> 
                    <?php echo "#" . $candyComment["orderid"]; ?>
                    <div class="card-body">
                    <?php echo formatComment($candyComment["comments"]); ?>
                    </div>
                </div>
                <?php
            }

        } else {
            echo "0 results";
        }
    ?>
<h2 class="my-4" id="call-me">Call Me comments (<a href="#top">back to top</a>)</h2>
    <?php
        $qCommentsForCall = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%call me%' OR `comments` REGEXP '[0-9]{10}' AND `comments` NOT LIKE '%Do not call%' AND `comments` NOT LIKE '%don%t call%'" ;
        $resCallComments = $conn->query($qCommentsForCall);
        if($resCallComments->num_rows > 0) {

            while($callComment = $resCallComments->fetch_assoc()) {
                if ($callComment["shipdate_expected"] == '0000-00-00 00:00:00') {
                    $expectedShipDate = extractShipDate($callComment["comments"]);
                    if(checkIsValidDate($expectedShipDate)) {
                        updateExpectedShipDateField($conn,$callComment["orderid"],$callComment["comments"]);
                    }
                }  
            ?>
                <div class="card">
                <?php echo "#" . $callComment["orderid"] ?>
                    <div class="card-body">
                    <?php echo formatComment($callComment["comments"]); ?>
                    </div>
                </div>
            <?php 
            }

        } else {
            echo "0 results";
        }
        ?>
<h2 class="my-4" id="dont-call-me">Don't Call Me comments (<a href="#top">back to top</a>)</h2>
    <?php
        $qCommentsForDontCall = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%don%t call me%' OR `comments` LIKE '%Do not call%'";
        $resDontCallComments = $conn->query($qCommentsForDontCall);
        if($resDontCallComments->num_rows > 0) {
            
            while($dontCallComment = $resDontCallComments->fetch_assoc()) {
                if ($dontCallComment["shipdate_expected"] == '0000-00-00 00:00:00') {
                    $expectedShipDate = extractShipDate($dontCallComment["comments"]);
                    if(checkIsValidDate($expectedShipDate)) {
                        updateExpectedShipDateField($conn,$dontCallComment["orderid"],$dontCallComment["comments"]);
                    }
                }  
                ?>
                <div class="card">
                <?php echo "#" . $dontCallComment["orderid"] ?>
                    <div class="card-body">
                    <?php echo formatComment($dontCallComment["comments"]); ?>
                    </div>
                </div>
                <?php
            }

        } else {
            echo "0 results";
        }
    ?>
<h2 class="my-4" id="who-referred-me">Who Referred Me comments (<a href="#top">back to top</a>)</h2>
    <?php 
        $qCommentsForRefered = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%referred me%'";
        $resReferredComments = $conn->query($qCommentsForRefered);
        if($resReferredComments->num_rows > 0) {
            while($referredComment = $resReferredComments->fetch_assoc()) {
                if ($referredComment["shipdate_expected"] == '0000-00-00 00:00:00') {
                    $expectedShipDate = extractShipDate($referredComment["comments"]);
                    if(checkIsValidDate($expectedShipDate)) {
                        updateExpectedShipDateField($conn,$referredComment["orderid"],$referredComment["comments"]);
                    }
                }  
                ?>
                <div class="card">
                    <?php echo "#" . $referredComment["orderid"] ?>
                    <div class="card-body">
                    <?php echo formatComment($referredComment["comments"]); ?>
                    </div>
                </div>
                <?php 
            }

        } else {
            echo "0 results";
        }
    ?>
<h2 class="my-4" id="signature-requirements">Signature Requirements comments (<a href="#top">back to top</a>)</h2>
    <?php 
        $qCommentsForSignature = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%signature%'";
        $resSignatureComments = $conn->query($qCommentsForSignature);
        if($resSignatureComments->num_rows > 0) {

            while($signatureComment = $resSignatureComments->fetch_assoc()) {
                if ($signatureComment["shipdate_expected"] == '0000-00-00 00:00:00') {
                    $expectedShipDate = extractShipDate($signatureComment["comments"]);
                    if(checkIsValidDate($expectedShipDate)) {
                        updateExpectedShipDateField($conn,$signatureComment["orderid"],$signatureComment["comments"]);
                    }
                }  
                ?>
                <div class="card">
                    <?php echo "#" . $signatureComment["orderid"] ?>
                    <div class="card-body">
                    <?php echo formatComment($signatureComment["comments"]); ?>
                    </div>
                </div>
                <?php  
            }

        } else {
            echo "0 results";
        }
    ?>
<h2 class="my-4" id="everything-else">Everything Else comments (<a href="#top">back to top</a>)</h2>
    <?php
        $qCommentsEverythingElse = "SELECT * FROM `sweetwater_test` WHERE `comments` NOT LIKE '%candy%' AND `comments` NOT LIKE '%call%' AND `comments` NOT LIKE '%signature%' AND `comments` NOT LIKE '%referred%' AND `comments` NOT REGEXP '(" . implode("|",$candyTerms) . ")' AND `comments` NOT REGEXP '[0-9]{10}'";
        $resEverythingElse = $conn->query($qCommentsEverythingElse);
        if($resEverythingElse->num_rows > 0) {

            while($otherComment = $resEverythingElse->fetch_assoc()) {
                if ($otherComment["shipdate_expected"] == '0000-00-00 00:00:00') {
                    $expectedShipDate = extractShipDate($otherComment["comments"]);
                    if(checkIsValidDate($expectedShipDate)) {
                        updateExpectedShipDateField($conn,$otherComment["orderid"],$otherComment["comments"]);
                    }
                }  
                ?>
                <div class="card">
                    <?php echo "#" . $otherComment["orderid"] ?>
                    <div class="card-body">
                    <?php echo formatComment($otherComment["comments"]); ?>
                    </div>
                </div>
                <?php
            }

        } else {
            echo "0 results";
        }
    ?>
<?php require_once ('./includes/footer.php'); ?>