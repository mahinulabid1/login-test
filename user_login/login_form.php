<?php
include "./modules/connection.php";
$login_button_content = "Submit";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data using $_POST
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $conn = connect_database();
    $sql = "SELECT email, password from user_list WHERE email = '$email'";

    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['password'] === $password) {
            $cookie_expiration = $expiry = time() + (10 * 365 * 24 * 60 * 60); // 10 years :)
            $login_button_content = "Login Successful! Redirecting...";
            setCookie("user_email", $email, $cookie_expiration, "/");
            header("Refresh: 3; url=./user_profile.php");
        } else {
            $login_button_content = "Login Failed!";
        }
    }
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="./styles/login_form.css">
    <link rel='stylesheet' href="./styles/navigation.css">
    <title>Document</title>
</head>
<body>

<?php include "./modules/navigation.php" ?>


<form action="./login_form.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit"><?php echo $login_button_content ?></button>
</form>
</body>
</html>

