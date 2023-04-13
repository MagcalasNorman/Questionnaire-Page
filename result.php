<?php
session_start();

if(!isset($_SESSION['registered']) || $_SESSION['registered'] !== true) {
  header("Location: index.php");
  exit;
}

if(!isset($_SESSION['answers']) || count($_SESSION['answers']) !== 10) {
  header("Location: quiz.php");
  exit;
}
$score = 0;
foreach($_SESSION['answers'] as $answer) {
  if($answer['selected'] === $answer['correct']) {
    $score++;
  }
}

echo "<h1>Thank You!</h1>";
echo "<p>Congratulations {$_SESSION['complete_name']} ({$_SESSION['email']})</p>";
echo "<p>Score: $score out of 10 items</p>";
echo "<h2>Your Answers</h2>";
foreach($_SESSION['answers'] as $index => $answer) {
  echo "<p>" . ($index+1) . ") {$answer['question']}</p>";
  echo "<p>Your answer: {$answer['selected']}</p>";
  echo "<p>Correct answer: {$answer['correct']}</p>";
}
echo "<p><a href='download.php'>Click here to download the results.</a></p>";

session_unset();
session_destroy();
?>