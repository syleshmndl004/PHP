<!DOCTYPE html>
<html>
<head>
    <title>Count Vowels</title>
</head>
<body>

    <form method="post" action="task5.php">
        Enter a sentence: <input type="text" name="sentence">
        <input type="submit" value="Count Vowels">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sentence = $_POST['sentence'];
        $vowels = 'aeiouAEIOU';
        $vowelCount = 0;
        $length = 0;
        while (isset($sentence[$length])) {
            $length++;
        }
        for ($i = 0; $i < $length; $i++) {
            $char = $sentence[$i];
            $isVowel = false;
            $vowelLength = 0;
            while(isset($vowels[$vowelLength])){
                $vowelLength++;
            }
            for($j = 0; $j < $vowelLength; $j++){
                if($char == $vowels[$j]){
                    $isVowel = true;
                    break;
                }
            }
            if ($isVowel) {
                $vowelCount++;
            }
        }
        echo "The number of vowels is: $vowelCount";
    }
    ?>

</body>
</html>
