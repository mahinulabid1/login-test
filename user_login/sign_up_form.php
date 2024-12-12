
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
        <form class="signup-form" action="./modules/db_new_user.php" method="POST">
            <label for="full-name">Full Name:</label>
            <input type="text" id="full-name" name="full-name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="3" required></textarea>

            <button type="submit">Sign Up</button>
        </form>
    </div>
    
</body>
</html>
