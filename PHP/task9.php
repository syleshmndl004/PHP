<!DOCTYPE html>
<html>
<head>
    <title>Password Validator</title>
</head>
<body>

    <form method="post" action="task9.php">
        Password: <input type="password" name="password">
        <input type="submit" value="Validate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST['password'];
        $errors = [];

        $length = 0;
        while(isset($password[$length])){
            $length++;
        }

        if ($length < 8) {
            $errors[] = "Password must be at least 8 characters long.";
        }

        $hasNumber = false;
        for($i = 0; $i < $length; $i++){
            if(is_numeric($password[$i])){
                $hasNumber = true;
                break;
            }
        }
        if (!$hasNumber) {
            $errors[] = "Password must include at least one number.";
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

        if (!$hasSpecial) {
            $errors[] = "Password must include at least one special character.";
        }

        if (empty($errors)) {
            echo "Password is valid.";
        } else {
            foreach ($errors as $error) {
                echo "<p style='color: red;'>$error</p>";
            }
        }
    }
    ?>

</body>
</html>
