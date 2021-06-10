<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./sweetwater.css" type="text/css">
</head>
<body>

<h1>Sweetwater</h1>

<?php
    // Setup Connection
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "sweet_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    
    // Set the queries for the report
    echo "<h2>CANDY</h2>";
    $query1 = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%candy%'";
    $result1 = $conn->query($query1);
    if($result1->num_rows > 0) {

        while($row1 = $result1->fetch_assoc()) {
            echo "id: " . $row1["orderid"]. " - Comment " . $row1["comments"] . "<br>";
        }

    } else {
        echo "0 results";
    }

    echo "<h2>CALL ME</h2>";
    // Set the queries for the report
    $query2 = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%call me%' AND `comments` NOT LIKE '%don%t call me%'";
    $result2 = $conn->query($query2);
    if($result2->num_rows > 0) {

        while($row2 = $result2->fetch_assoc()) {
            echo "id: " . $row2["orderid"]. " - Comment " . $row2["comments"] . "<br>";
        }

    } else {
        echo "0 results";
    }

    echo "<h2>DONT CALL ME</h2>";
    // Set the queries for the report
    $query3 = "SELECT * FROM `sweetwater_test` WHERE `comments` LIKE '%don%t call me%'";
    $result3 = $conn->query($query3);
    if($result3->num_rows > 0) {

        while($row3 = $result3->fetch_assoc()) {
            echo "id: " . $row3["orderid"]. " - Comment " . $row3["comments"] . "<br>";
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
            echo "id: " . $row4["orderid"]. " - Comment " . $row4["comments"] . "<br>";
        }

    } else {
        echo "0 results";
    }

    echo "<h2>EVERYTHING ELSE</h2>";
    // Set the queries for the report
    $query5 = "SELECT * FROM `sweetwater_test` WHERE `comments` NOT LIKE '%candy%' AND `comments` NOT LIKE `%call me%` AND `comments` NOT LIKE '%referred me%'";
    $result5 = $conn->query($query5);
    if($result5->num_rows > 0) {

        while($row5 = $result5->fetch_assoc()) {
            echo "id: " . $row5["orderid"]. " - Comment " . $row5["comments"] . "<br>";
        }

    } else {
        echo "0 results";
    }


    $conn->close();
?>

</body>
</html>