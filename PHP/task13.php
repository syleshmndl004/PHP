<!DOCTYPE html>
<html>
<head>
    <title>Registration Preview</title>
</head>
<body>

    <form method="post" action="task13.php">
        Name: <input type="text" name="name"><br>
        Email: <input type="text" name="email"><br>
        Password: <input type="password" name="password"><br>
        Confirm Password: <input type="password" name="confirm_password"><br>
        <input type="submit" value="Preview">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $errors = [];

        if (empty($name)) {
            $errors[] = "Name is required.";
        }
        if (empty($email)) {
            $errors[] = "Email is required.";
        }
        if (empty($password)) {
            $errors[] = "Password is required.";
        }
        if ($password !== $confirm_password) {
            $errors[] = "Passwords do not match.";
        }

        if (empty($errors)) {
            $password_strength = "Weak";
            $length = 0;
            while(isset($password[$length])){
                $length++;
            }
            $hasNumber = false;
            for($i = 0; $i < $length; $i++){
                if(is_numeric($password[$i])){
                    $hasNumber = true;
                    break;
                }
            }
            $hasSpecial = false;
            $specialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?';
            $specialLength = 0;
            while(isset($specialChars[$specialLength])){
                $specialLength++;
            }
            for($i = 0; $i < $length; $i++){
                for($j = 0; $j < $specialLength; $j++){
                    if($password[$i] == $specialChars[$j]){
                        $hasSpecial = true;
                        break;
                    }
                }
                if($hasSpecial){
                    break;
                }
            }

            if ($length >= 8 && $hasNumber && $hasSpecial) {
                $password_strength = "Strong";
            }

            echo "<h3>Registration Preview:</h3>";
            echo "Name: $name<br>";
            echo "Email: $email<br>";
            echo "Password Strength: $password_strength<br>";
        } else {
            foreach ($errors as $error) {
                echo "<p style='color: red;'>$error</p>";
            }
        }
    }
    ?>

</body>
</html>
