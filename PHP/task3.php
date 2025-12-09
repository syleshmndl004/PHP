<!DOCTYPE html>
<html>
<head>
    <title>Multiplication Table Generator</title>
</head>
<body>

    <form method="post" action="task3.php">
        Enter a number: <input type="text" name="number">
        <input type="submit" value="Generate Table">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST['number'];
        if (is_numeric($number)) {
            echo "<h3>Multiplication Table for $number</h3>";
            for ($i = 1; $i <= 10; $i++) {
                echo "$number x $i = " . ($number * $i) . "<br>";
            }
        } else {
            echo "Please enter a valid number.";
        }
    }
    ?>

</body>
</html>
