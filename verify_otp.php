<?php
require_once "database.php";
require_once "send_otp.php";

session_start();
if(!isset($_SESSION['email']) || !isset($_SESSION['otp'])){
    header('Location: index.php');
    exit();
}

if(isset($_GET['resend'])){
    $otp = generateOTP();
    $_SESSION['otp'] = $otp;

    sendOTPEmail($_SESSION['email'], $otp);
    $resendMessage = "A new otp has been sent to your email";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Enter OTP</h2>
    <?php if(isset($resendMessage)): ?>
        <div style="color: green;"> <?= htmlspecialchars($resendMessage) ?> </div>
    <?php endif; ?>
    <form action="process_otp.php" method="post">
        <input type="text" name="user_otp" placeholder="Enter OTP" require><br>
        <input type="submit" value="submit"><br>
        <a href="verify_otp.php?resend=true">Resend OTP</a>
        <br>
        <a href="index.php">Back to login</a>

    </form>
</body>
</html>