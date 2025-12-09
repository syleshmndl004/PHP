<?php

$name = "Sailesh Mandal";

// Today's date
$dateToday = date("Y-m-d"); // Format: 2025-12-05

// Current hour in 24-hour format
$currentHour = date("H");

echo "Name: $name<br>";
echo "Today's Date: $dateToday<br>";

// Conditional logic
if ($currentHour < 12) {
    echo "It is morning.";
} elseif ($currentHour < 18) {
    echo "It is afternoon.";
} else {
    echo "It is evening.";
}
?>
