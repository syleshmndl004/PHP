<!DOCTYPE html>
<html>
<head>
    <title>Email Format Check</title>
</head>
<body>

    <form method="post" action="task8.php">
        Email: <input type="text" name="email">
        <input type="submit" value="Check">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $atPos = false;
        $dotPos = false;
        $length = 0;
        while(isset($email[$length])){
            $length++;
        }

        for($i = 0; $i < $length; $i++){
            if($email[$i] == '@'){
                $atPos = $i;
                break;
            }
        }

        for($i = 0; $i < $length; $i++){
            if($email[$i] == '.'){
                $dotPos = $i;
                break;
            }
        }


        if ($atPos !== false && $dotPos !== false && $atPos > 0 && $dotPos > $atPos) {
            echo "Email format is correct (basic check).";
        } else {
            echo "Email format incorrect (basic check).";
        }
    }
    ?>

</body>
</html>
