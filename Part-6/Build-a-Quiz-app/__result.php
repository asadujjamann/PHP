<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <!-- <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css"> -->
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
        
        if($questions[$i]['type'] == 'single'){
            $correctAnswer = $questions[$i]['answer'];
            if($correctAnswer == $userAnswer){
                $scrore++;
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