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
    $full_name = trim($_POST['full-name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm-password']);
    $address = trim($_POST['address']);

    // password validation needs to be done in javascript

    $sql = "INSERT INTO user_list (full_name, email, password, address) VALUES ('$full_name', '$email', '$password', '$address')";
    

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header("Location: ../");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
} else {
    echo "Invalid request method.";
}
?>
