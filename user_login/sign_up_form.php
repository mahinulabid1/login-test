<?php
    include "./modules/connection.php";
    $sign_up_button = "Sign Up";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data using $_POST
        $full_name = trim($_POST['full-name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $address = trim($_POST['address']);

        $conn = connect_database();
        $sql = "INSERT INTO user_list (full_name, email, password, address) VALUES ('$full_name', '$email', '$password', '$address')";

        if (mysqli_query($conn, $sql)) {
            $cookie_expiration = $expiry = time() + (10 * 365 * 24 * 60 * 60); // 10 years :)
            setCookie("user_email", $email, $cookie_expiration, "/");
            $sign_up_button = "Success! Redirecting!";
            header("Refresh: 3; url=./user_profile.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    }
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up Form</title>
    <link rel="stylesheet" href="./styles/sign_up.css">
    <link rel='stylesheet' href="./styles/navigation.css">
</head>
<body>

<?php include "./modules/navigation.php" ?>

<div class="form_container">
    <form class="signup-form" action="./sign_up_form.php" method="POST">
        <label for="full-name">Full Name:</label>
        <input type="text" id="full-name" name="full-name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

<!--        <label for="confirm-password">Confirm Password:</label>-->
<!--        <input type="password" id="confirm-password" name="confirm-password" required>-->

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="3" required></textarea>

        <button type="submit"><?php echo $sign_up_button; ?></button>
    </form>
</div>

</body>
</html>
