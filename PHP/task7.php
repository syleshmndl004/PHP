<!DOCTYPE html>
<html>
<head>
    <title>Form Validation</title>
</head>
<body>

    <form method="post" action="task7.php">
        Full Name: <input type="text" name="fullName"><br>
        Email: <input type="text" name="email"><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];

        if (empty($fullName) || empty($email)) {
            echo "<p style='color: red;'>Error: All fields are required.</p>";
        } else {
            echo "<p style='color: green;'>All good!</p>";
        }
    }
    ?>

</body>
</html>
