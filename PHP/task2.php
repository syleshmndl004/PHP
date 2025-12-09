<?php
// Temperature Decision Program
$temp = 17; 
echo "The current temperature is $temp degrees Celsius.<br>";

if ($temp < 15) {
    echo "It's Cold.";
} elseif ($temp >= 15 && $temp <= 30) {
    echo "It's Warm.";
} else {
    echo "It's Hot.";
}
?>
