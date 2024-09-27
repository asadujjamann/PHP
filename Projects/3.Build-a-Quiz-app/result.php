<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <!-- <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css"> -->
    <style>
        .correctAnswer{
            position: relative;
        }
        .correctAnswer::before{
            content: "\2713";
            position: absolute;
            left: -15px;
            top: 0;
        }
        .wrong{
            color: red;
        }
    </style>
</head>
<body>

<?php
    $quizData = file_get_contents('quiz.json');
    $quizzes = json_decode($quizData, true);
    $scrore = 0;
    $questions = $quizzes['questions'];
    $totalQuestions = count($questions);

    for($i = 0; $i < $totalQuestions; $i++){
        $userAnswer = $_POST["quiz-" . $i] ?? null;
        $correctAnswer = $questions[$i]['answer'];
        $isCorrect = false;

        echo "<h2>Question - " . $i+1 . ": {$questions[$i]['question']} </h2>";

        // Display the user's given answer in a new <p> tag
        if (is_array($userAnswer)) {
            echo "<p>Your given answers were <mark>" . implode(", ", $userAnswer) . "</mark></p>";
        } else {
            echo "<p>Your given answer was <mark>$userAnswer</mark></p>";
        }

        if($questions[$i]['type'] == 'single'){
            if($correctAnswer == $userAnswer){
                $scrore++;
            }
            foreach($questions[$i]['options'] as $option){
                $style = ($option == $userAnswer) ? ($isCorrect ? 'correct' : 'incorrect') : '';
                $correctClass = ($option == $correctAnswer) ? 'correctAnswer' : '';
                echo "<div class='answer {$style} {$correctClass}'>" . $option . "</div>";
            }
        }elseif($questions[$i]['type'] == 'multiple'){
            $correctAnswer = $questions[$i]['answer'];

            // Check if user answer is an array
            if(is_array($userAnswer)){
                sort($userAnswer); // Sort user answers
                sort($correctAnswer); // Sort correct answers
                if($correctAnswer == $userAnswer){
                    $scrore++;
                }
            }

            foreach($questions[$i]['options'] as $option){

                $style = (is_array($userAnswer) && in_array($option, $userAnswer)) ? 
                         (in_array($option, $correctAnswer) ? 'correct' : 'incorrect') : '';
                $correctClass = (in_array($option, $correctAnswer)) ? 'correctAnswer' : '';
                echo "<div class='answer {$style} {$correctClass}'>" . $option . "</div>";

            }
        }
    }

    echo "<h1>Your score is {$scrore} out of {$totalQuestions} </h1>";

?>


<h3>Go back to <a href="index.php">Quiz</a></h3>


<?php
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
?>


</body>
</html>