<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <!-- <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css"> -->
    <style>
        code {
            white-space: pre-wrap; /* Preserves line breaks and spaces */
            font-family: monospace; /* Optional: for code-like font */
        }
      </style>
</head>
<body>

<?php
    $quizData = file_get_contents('quiz.json');
    $quizzes = json_decode($quizData, true);
?>

<h1><?= $quizzes['title']?></h1>

<form action="result.php" method="post">
    <?php
        foreach($quizzes['questions'] as $index => $quiz) {
            echo "<h2>Question - " . $index+1 . ": {$quiz['question']} </h2>";

            if($quiz['type'] === 'single') {
                foreach($quiz['options'] as $option) {
                    echo "<input type='radio' id='option-{$index}-{$option}' name='quiz-{$index}' value=\"{$option}\">
                        <label for='option-{$index}-{$option}'>{$option}</label><br>";
                }
            }elseif($quiz['type'] === 'multiple') {
                foreach($quiz['options'] as $option) {
                    echo "<input type='checkbox' id='option-{$index}-{$option}' name='quiz-{$index}[]' value=\"{$option}\">
                        <label for='option-{$index}-{$option}'>{$option}</label><br>";
                }
            }
        }
    ?>

    <br>
    <button type="submit">Submit</button>
</form>

<?php
    // echo '<code>';
    // print_r($quizzes);
    // echo '</code>';
?>

</body>
</html>

