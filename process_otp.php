<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_otp = $_POST['user_otp'];

    if($user_otp == $_SESSION['otp']){
        header('Location: dashboard.php');
        exit();
    }
    else{
        echo "invalid otp!";
        header('Location: verify_otp.php');
        exit();
    }
}