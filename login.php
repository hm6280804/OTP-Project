<?php

session_start();
require_once 'database.php';
require_once 'send_otp.php';


if (isset($_GET['resend'])){
    // echo "hi tehre";
    // $email = $_SESSION['email'];
        $otp = generateOTP();
        $_SESSION['email'] = $email;
        $_SESSION['otp'] = $otp;

        sendOTPEmail('hm6280804@gmail.com', $otp);
        header('Location: verify_otp.php');
        exit();
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    $conn = connectDatabase();
    $stmt = $conn->prepare('SELECT * FROM persons where email = ? AND password = ?');
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $otp = generateOTP();
        $_SESSION['email'] = $email;
        $_SESSION['otp'] = $otp;

        sendOTPEmail($email, $otp);
        header('Location: verify_otp.php');
        exit();
    }
    else{
        echo "invalid credentials";
    }
}
