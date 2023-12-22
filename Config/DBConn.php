<?php
    $host = "localhost";
    $user = "root";
    $pass = "hien123@123";
    $dbName = "utt";
    $conn = mysqli_connect($host, $user, $pass, $dbName);
    if($conn->connect_error) {
        die("Connection failed".mysqli_connect_error());
    }
?>