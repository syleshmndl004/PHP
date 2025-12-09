<!DOCTYPE html>
<html>
<head>
    <title>Reverse a String</title>
</head>
<body>

    <form method="post" action="task4.php">
        Enter a word: <input type="text" name="word">
        <input type="submit" value="Reverse">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $word = $_POST['word'];
        $reversedWord = '';
        $length = 0;
        while (isset($word[$length])) {
            $length++;
        }
        for ($i = $length - 1; $i >= 0; $i--) {
            $reversedWord .= $word[$i];
        }
        echo "The reversed word is: $reversedWord";
    }
    ?>

</body>
</html>
