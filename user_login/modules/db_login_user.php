<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";


// connection probably has to be on the top
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data using $_POST
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
 

    // password validation needs to be done in javascript

    $sql = "SELECT email, password from user_list WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        // echo "Name: " . $row['name'] . "<br>";
        // echo "Email: " . $row['email'] . "<br>";
        // echo "Address: " . $row['address'] . "<br><br>";
        if ($row['password'] === $password) {
            echo "User login successful";
        } else {
            echo "user login failed";
        }
    }

    // if (!$result) {
    //     echo "No user found on this record!";
    //     // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    // }



    
} else {
    echo "Invalid request method.";
}
?>
