<?php
    $host = "localhost";
    $user = "root";
    $password = "root";
    $db = "sweet_db";

    // Setup the connection to the database
    $conn=mysqli_connect($host,$user,$password,$db);
    if($mysqli_connect_error())
        die('Connect Error');
?>