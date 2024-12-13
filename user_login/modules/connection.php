<?php

// connection probably has to be on the top
function connect_database($db_name="user") {
    $server_name = "localhost";
    $user_name = "root";
    $password = "";
    $conn = mysqli_connect($server_name, $user_name, $password, $db_name);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        return $conn;
    }
}


?>