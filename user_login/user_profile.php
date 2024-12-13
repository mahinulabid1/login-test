<?php
// Accessing query string parameters
include "./modules/connection.php";
$conn = connect_database("user");

function logout_user() {
    setcookie("user_email", "", time() - 3600, "/"); // technically removing the cookie
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    logout_user();
    header("Refresh: 1; url=./"); // redirecting after 1 second
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="./styles/navigation.css">
    <link rel='stylesheet' href="./styles/index.css">
    <title>User Profile</title>
</head>
<body>

<?php
if (isset($_COOKIE['user_email'])) {
    $user = $_COOKIE['user_email'];

    echo "<h1 style='text-align:center; margin-top:50px;'>Welcome, " . $user . "</h1>";
    echo '
     <form method="POST" action="./user_profile.php">
        <div style="text-align:center; margin-top:50px;">
            <button style="cursor:pointer;" type="submit" name="logout">Logout</button>
        </div>
       
    </form>
    ';
}
else {
    echo "<h1 style='text-align: center;'>Redirecting to Home Page!</h1>";
    header("Refresh: 3; url=./");
}
?>


</body>
</html>
