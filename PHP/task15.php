<?php
$otp = '';
for ($i = 0; $i < 6; $i++) {
    $otp .= mt_rand(0, 9);
}

echo "Your 6-digit OTP is: $otp";
?>
