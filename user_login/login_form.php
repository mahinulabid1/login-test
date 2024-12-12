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


    <form action="./modules/db_login_user.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>

