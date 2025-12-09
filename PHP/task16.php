<!DOCTYPE html>
<html>
<head>
    <title>Simple Login</title>
</head>
<body>

    <form method="post" action="task16.php">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === "admin" && $password === "1234@admin") {
            echo "Welcome Admin";
        } else {
            echo "Invalid credentials";
        }
    }
    ?>

</body>
</html>
