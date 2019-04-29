<?php
require('/textlocal.class.php');

$textlocal = new Textlocal(false, false , lidWcryoYXQ-OBeXzVEDpozOJ7z6hAjIyBw7NoMTXV);

$numbers = array(918123456789);
$sender = 'Textlocal';
$otp = mt_rand(10000, 99999);
$message = 'Hello this is your OTP'.$otp;

try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    setcookie('otp', $otp);
    echo "OTP successfully send...";
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
?>