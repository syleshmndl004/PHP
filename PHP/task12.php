<?php
$json_data = file_get_contents('products.json');
$products = json_decode($json_data, true);

if ($products) {
    foreach ($products as $product) {
        echo "Name: " . $product['name'] . ", Price: " . $product['price'] . "<br>";
    }
} else {
    echo "Could not read or decode JSON file.";
}
?>
