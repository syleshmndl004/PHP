<!DOCTYPE html>
<html>
<head>
    <title>User Info Preview</title>
</head>
<body>

    <form method="post" action="task6.php">
        Name: <input type="text" name="name"><br>
        Age: <input type="text" name="age"><br>
        Favorite Programming Language: <input type="text" name="language"><br>
        <input type="submit" value="Preview">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $language = $_POST['language'];

        if (!empty($name) && !empty($age) && !empty($language)) {
            echo "<h3>Preview:</h3>";
            echo "Name: $name<br>";
            echo "Age: $age<br>";
            echo "Favorite Programming Language: $language<br>";
        } else {
            echo "<p style='color: red;'>Please fill in all fields.</p>";
        }
    }
    ?>

</body>
</html>
