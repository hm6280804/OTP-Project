<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Log in</h2>
    <form action="login.php" method="post">
        <input type="email" name="email" placeholder="email" require>
        <input type="password" name="password" placeholder="password" require>
        <input type="submit" value="login">
    </form>
</body>
</html>