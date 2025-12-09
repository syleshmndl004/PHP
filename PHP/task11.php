<?php
$users = [
  ["email" => "ram@gmail.com"],
  ["email" => "sk@gmail.com"],
  ["email" => "hari@gmail.com"]
];

$newEmail = "sk@gmail.com"; // Change this to test
$emailExists = false;

foreach ($users as $user) {
    if ($user['email'] === $newEmail) {
        $emailExists = true;
        break;
    }
}

if ($emailExists) {
    echo "Email already exists";
} else {
    echo "Email available";
}
?>
