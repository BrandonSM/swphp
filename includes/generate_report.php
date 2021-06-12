<?php

    require ('./includes/conn.php');

    // Set the queries for the report
    echo "<h2>CANDY</h2>";
    $query1 = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%candy%'";
    $result1 = $conn->query($query1);
    if($result1->num_rows > 0) {

        while($row1 = $result1->fetch_assoc()) {
            $dateExploded = explode("Expected Ship Date: ", $row1["comments"]);
            if(isset($dateExploded[1])) {
                $newDate = date("Y-m-d", strtotime($dateExploded[1])); 
                $strReplaced = str_replace("Expected Ship Date: " . $dateExploded[1], "", $row1["comments"]);
                echo "orderid: " . $row1["orderid"]. " - Comment: " . $strReplaced . " - Expected Date: " . $newDate . "<br>";
            } else {
                echo "orderid: " . $row1["orderid"] . " - Comment: " . $row1["comments"] . "<br>";
            }
        }

    } else {
        echo "0 results";
    }

    echo "<h2>CALL ME</h2>";
    // Set the queries for the report
    $query2 = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%call me%' AND `comments` NOT LIKE '%Do not call%' AND `comments` NOT LIKE '%don%t call%' ORDER BY `orderid` ASC";
    $result2 = $conn->query($query2);
    if($result2->num_rows > 0) {

        while($row2 = $result2->fetch_assoc()) {
            echo "orderid: " . $row2["orderid"]. " - Comment " . $row2["comments"] . "<br>";
        }

    } else {
        echo "0 results";
    }

    echo "<h2>DONT CALL ME</h2>";
    // Set the queries for the report
    $query3 = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%don%t call me%' OR `comments` LIKE '%Do not call%'";
    $result3 = $conn->query($query3);
    if($result3->num_rows > 0) {

        while($row3 = $result3->fetch_assoc()) {
            echo "orderid: " . $row3["orderid"]. " - Comment " . $row3["comments"] . "<br>";
        }

    } else {
        echo "0 results";
    }

    echo "<h2>WHO REFERRED ME</h2>";
    // Set the queries for the report
    $query4 = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%referred me%'";
    $result4 = $conn->query($query4);
    if($result4->num_rows > 0) {

        while($row4 = $result4->fetch_assoc()) {
            echo "orderid: " . $row4["orderid"]. " - Comment " . $row4["comments"] . "<br>";
        }

    } else {
        echo "0 results";
    }

    echo "<h2>SIGNATURE REQUIREMENTS</h2>";
    // Set the queries for the report
    $query5 = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%signature%'";
    $result5 = $conn->query($query5);
    if($result5->num_rows > 0) {

        while($row5 = $result5->fetch_assoc()) {
            echo "orderid: " . $row5["orderid"]. " - Comment " . $row5["comments"] . "<br>";
        }

    } else {
        echo "0 results";
    }

    echo "<h2>EVERYTHING ELSE</h2>";
    // Set the queries for the report
    $query6 = "SELECT * FROM `sweetwater_test` WHERE `comments` NOT LIKE '%candy%' AND `comments` NOT LIKE '%call%' AND `comments` NOT LIKE '%signature%' AND `comments` NOT LIKE '%referred%'";
    $result6 = $conn->query($query6);
    if($result6->num_rows > 0) {

        while($row6 = $result6->fetch_assoc()) {
            echo "orderid: " . $row6["orderid"]. " - Comment " . $row6["comments"] . "<br>";
        }

    } else {
        echo "0 results";
    }

    $conn->close();
?>