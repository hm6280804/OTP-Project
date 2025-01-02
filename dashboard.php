<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome to Dashboard</h2>
    <p>Logged in as: <?php echo $_SESSION['email']; ?></p>
    
    <a href="logout.php" style="color: red;">Logout</a>
</body>
</html>