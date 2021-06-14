<?php require_once ('./includes/header.php'); ?>
<h1>Sweetwater Comments Report</h1>
<h2 class="my-4">Candy Comments</h2>
    <?php
        $candyTerms = [
            'candy',
            'tootsie',
            'smarties'
        ];
        $qCommentsForCandy = "SELECT * FROM `sweetwater_test` WHERE `comments` REGEXP '(" . implode("|",$candyTerms) . ")'";
        $resCandyComments = $conn->query($qCommentsForCandy);
        if($resCandyComments->num_rows > 0) {

            while($candyComment = $resCandyComments->fetch_assoc()) { ?>

                <div class="card"> 
                    <?php echo "#" . $candyComment["orderid"]; ?>
                    <div class="card-body">
                        <?php  
                        $expectedDate = explode("Expected Ship Date: ", $candyComment["comments"]);
                        if(isset($expectedDate[1])) {
                            $newDate = date("Y-m-d", strtotime($expectedDate[1])); 
                            $strReplaced = str_replace("Expected Ship Date: " . $expectedDate[1], "", $candyComment["comments"]);
                        ?>
                        <span><?php echo $strReplaced . "<br/><br/><em>Expected Date: " . $newDate . "</em>"; ?></span>
                        <?php 
                        } else {
                        ?> 
                        <span><?php echo $candyComment["comments"]; ?></span>
                        <?php
                        } 
                        ?>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "0 results";
        }
    ?>
<h2 class="my-4">Call Me comments</h2>
    <?php
        $qCommentsForCall = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%call me%' AND `comments` NOT LIKE '%Do not call%' AND `comments` NOT LIKE '%don%t call%'" ;
        $resCallComments = $conn->query($qCommentsForCall);
        if($resCallComments->num_rows > 0) {

            while($callComment = $resCallComments->fetch_assoc()) {
            ?>
                <div class="card">
                <?php echo "#" . $callComment["orderid"] ?>
                    <div class="card-body">
                    <?php  
                        $expectedDate = explode("Expected Ship Date: ", $callComment["comments"]);
                        if(isset($expectedDate[1])) {
                            $newDate = date("Y-m-d", strtotime($expectedDate[1])); 
                            $strReplaced = str_replace("Expected Ship Date: " . $expectedDate[1], "", $callComment["comments"]);
                        ?>
                        <span><?php echo $strReplaced . "<br/><br/><em>Expected Date: " . $newDate . "</em>"; ?></span>
                        <?php 
                        } else {
                        ?> 
                        <span><?php echo $callComment["comments"]; ?></span>
                        <?php
                        } 
                        ?>
                    </div>
                </div>
            <?php 
            }

        } else {
            echo "0 results";
        }
        ?>
<h2 class="my-4">Don't Call Me comments</h2>
    <?php
        $qCommentsForDontCall= "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%don%t call me%' OR `comments` LIKE '%Do not call%'";
        $resDontCallComments = $conn->query($qCommentsForDontCall);
        if($resDontCallComments->num_rows > 0) {
            while($dontCallComment = $resDontCallComments->fetch_assoc()) {
                ?>
                <div class="card">
                <?php echo "#" . $dontCallComment["orderid"] ?>
                    <div class="card-body">
                    <?php  
                        $expectedDate = explode("Expected Ship Date: ", $dontCallComment["comments"]);
                        if(isset($expectedDate[1])) {
                            $newDate = date("Y-m-d", strtotime($expectedDate[1])); 
                            $strReplaced = str_replace("Expected Ship Date: " . $expectedDate[1], "", $dontCallComment["comments"]);
                        ?>
                        <span><?php echo $strReplaced . "<br/><br/><em>Expected Date: " . $newDate . "</em>"; ?></span>
                        <?php 
                        } else {
                        ?> 
                        <span><?php echo $dontCallComment["comments"]; ?></span>
                        <?php
                        } 
                        ?>
                    </div>
                </div>
                <?php
            }

        } else {
            echo "0 results";
        }
    ?>
<h2 class="my-4">Who Referred Me comments</h2>
    <?php 
        $qCommentsForRefered = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%referred me%'";
        $resReferredComments = $conn->query($qCommentsForRefered);
        if($resReferredComments->num_rows > 0) {
            while($referredComment = $resReferredComments->fetch_assoc()) {
                ?>
                <div class="card">
                    <?php echo "#" . $referredComment["orderid"] ?>
                    <div class="card-body">
                    <?php  
                        $expectedDate = explode("Expected Ship Date: ", $referredComment["comments"]);
                        if(isset($expectedDate[1])) {
                            $newDate = date("Y-m-d", strtotime($expectedDate[1])); 
                            $strReplaced = str_replace("Expected Ship Date: " . $expectedDate[1], "", $referredComment["comments"]);
                        ?>
                        <span><?php echo $strReplaced . "<br/><br/><em>Expected Date: " . $newDate . "</em>"; ?></span>
                        <?php 
                        } else {
                        ?> 
                        <span><?php echo $referredComment["comments"]; ?></span>
                        <?php
                        } 
                        ?>
                    </div>
                </div>
                <?php 
            }

        } else {
            echo "0 results";
        }
    ?>
<h2 class="my-4">Signature Requirements comments</h2>
    <?php 
        $qCommentsForSignature = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%signature%'";
        $resSignatureComments = $conn->query($qCommentsForSignature);
        if($resSignatureComments->num_rows > 0) {

            while($signatureComment = $resSignatureComments->fetch_assoc()) {
                ?>
                <div class="card">
                    <?php echo "#" . $signatureComment["orderid"] ?>
                    <div class="card-body">
                    <?php  
                        $expectedDate = explode("Expected Ship Date: ", $signatureComment["comments"]);
                        if(isset($expectedDate[1])) {
                            $newDate = date("Y-m-d", strtotime($expectedDate[1])); 
                            $strReplaced = str_replace("Expected Ship Date: " . $expectedDate[1], "", $signatureComment["comments"]);
                        ?>
                        <span><?php echo $strReplaced . "<br/><br/><em>Expected Date: " . $newDate . "</em>"; ?></span>
                        <?php 
                        } else {
                        ?> 
                        <span><?php echo $signatureComment["comments"]; ?></span>
                        <?php
                        } 
                        ?>
                    </div>
                </div>
                <?php 
            }
        } else {
            echo "0 results";
        }
    ?>
<h2 class="my-4">Everything Else comments</h2>
    <?php
        $qCommentsEverythingElse = "SELECT * FROM `sweetwater_test` WHERE `comments` NOT LIKE '%candy%' AND `comments` NOT LIKE '%call%' AND `comments` NOT LIKE '%signature%' AND `comments` NOT LIKE '%referred%' AND `comments` NOT REGEXP '(" . implode("|",$candyTerms) . ")'";
        $resEverythingElse = $conn->query($qCommentsEverythingElse);
        if($resEverythingElse->num_rows > 0) {

            while($otherComment = $resEverythingElse->fetch_assoc()) {
                ?>
                <div class="card">
                    <?php echo $otherComment["orderid"] ?>
                    <div class="card-body">
                    <?php  
                        $expectedDate = explode("Expected Ship Date: ", $otherComment["comments"]);
                        if(isset($expectedDate[1])) {
                            $newDate = date("Y-m-d", strtotime($expectedDate[1])); 
                            $strReplaced = str_replace("Expected Ship Date: " . $expectedDate[1], "", $otherComment["comments"]);
                        ?>
                        <span><?php echo $strReplaced . "<br/><br/><em>Expected Date: " . $newDate . "</em>"; ?></span>
                        <?php 
                        } else {
                        ?> 
                        <span><?php echo $otherComment["comments"]; ?></span>
                        <?php
                        } 
                        ?>
                    </div>
                </div>
                <?php
            }

        } else {
            echo "0 results";
        }
    ?>
<?php require_once ('./includes/footer.php'); ?>