<?php
$nameErr = $emailErr = $passwordErr = $confirmPasswordErr = "";
$name = $email = $password = $confirmPassword = "";
$successMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Name validation
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    // Email validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Password validation
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        // Password strength check (e.g., minimum 8 characters, at least one letter and one number)
        if (strlen($password) < 8 || !preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
            $passwordErr = "Password must be at least 8 characters long and contain at least one letter and one number.";
        }
    }

    // Confirm password validation
    if (empty($_POST["confirm_password"])) {
        $confirmPasswordErr = "Please confirm password";
    } else {
        $confirmPassword = test_input($_POST["confirm_password"]);
        if ($password !== $confirmPassword) {
            $confirmPasswordErr = "Passwords do not match";
        }
    }

    // If all validations pass
    if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
        $users_file = 'users.json';
        $users = [];
        $file_error = "";

        // Read existing users
        if (file_exists($users_file)) {
            $json_data = file_get_contents($users_file);
            if ($json_data === false) {
                $file_error = "Error reading from users file.";
            } else {
                $users = json_decode($json_data, true);
                if ($users === null) {
                    $file_error = "Error decoding users file.";
                    $users = []; // Reset to empty array
                }
            }
        } else {
            // If the file doesn't exist, we can proceed with an empty users array.
            // We could also add an error here if the file is expected to exist.
        }

        if(empty($file_error)) {
            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Create new user
            $new_user = [
                'name' => $name,
                'email' => $email,
                'password' => $hashed_password
            ];

            // Add new user to the array
            $users[] = $new_user;

            // Write updated array to file
            if (file_put_contents($users_file, json_encode($users, JSON_PRETTY_PRINT))) {
                $successMsg = "Registration successful!";
            } else {
                $file_error = "Error writing to users file.";
            }
        }

        if (!empty($file_error)) {
            // Display file error. We can display it in a general error area.
            // For simplicity, I'll just assign it to one of the existing error variables.
            $nameErr = $file_error;
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<h2>User Registration Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


    <label for="name">Name:</label> 
    <input type="text" id="name" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span>

    <br><br>

    <label for="email">E-mail:</label> 
    <input type="text" id="email" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>

    <label for="password">Password:</label> <input type="password" id="password" name="password" value="">
    <span class="error">* <?php echo $passwordErr;?></span>

    <br><br>
    <label for="confirm_password">Confirm Password:</label> 
    <input type="password" id="confirm_password" name="confirm_password" value="">
    <span class="error">* <?php echo $confirmPasswordErr;?></span>

    <br><br>
    <input type="submit" name="submit" value="Register">
</form>

<?php
if (!empty($successMsg)) {
    echo "<div>".$successMsg."</div>";
}
?>

</body>
</html>
