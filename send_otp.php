<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function generateOTP($length = 6){
    return sprintf("%0{$length}d", mt_rand(1, 999999));
}

function sendOTPEmail($email, $otp){
    $mail = new PHPMailer(true);

    try{
        $mail->isSMTP();
        $mail->Host = EMAIL_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL_USER;
        $mail->Password = EMAIL_PASS;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom(EMAIL_USER, 'Your app name');
        $mail->addAddress($email);
        $mail->Subject = 'Your OTP for login';
        $mail->Body = "Your OTP is: $otp";

        $mail->send();
        return true;
    }
    catch (Exception $e) {
        return false;
    }
}