<?php 
    $hostname = 'localhost';
    $dbname = 'aviation-portal';
    $username = 'root';
    $password = '';

    // 1. create a connection to our database
    $con = new mysqli($hostname, $username, $password, $dbname);

    // 2. test connection for errors
    if ($con->errno) {
        die ("Connection error" . $con->error);
    } else {
        //  echo "Successfully Connected to the database";
    }
?>
