<?php
$data = [
  "username" => "student123",
  "role" => "learner",
  "active" => true
];

$json_string = json_encode($data, JSON_PRETTY_PRINT);

echo "<pre>$json_string</pre>";
?>
