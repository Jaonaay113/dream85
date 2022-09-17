<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dream";

    // Create Connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //Check coonnection
    if (!$conn) { 
        die("connection failed" . mysqli_connect_error());
    }else{
        echo "connected successfully";
    }
       
?>