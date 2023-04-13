<?php
session_start();

$result_summary = $_SESSION['result_summary'];

$filename = 'results.txt';

$file = fopen($filename, 'w');

fwrite($file, "Complete Name: {$result_summary['complete_name']}\n");
fwrite($file, "Email: {$result_summary['email']}\n");
fwrite($file, "Birthdate: {$result_summary['birthdate']}\n\n");

foreach ($result_summary['answers'] as $key => $value) {
  $question = $value['question'];
  $choices = $value['choices'];
  $answer = $_POST[$key];
  $is_correct = $value['correct'] === $answer;
  $result = $is_correct ? 'correct' : 'incorrect';

  fwrite($file, "$question\n");
  foreach ($choices as $choice) {
    $choice_result = ($choice === $answer) ? "($result)" : "";
    fwrite($file, "- $choice $choice_result\n");
  }
  fwrite($file, "\n");
}

fwrite($file, "Score: {$result_summary['score']} out of 10 items");

fclose($file);

header("Content-disposition: attachment; filename=$filename");
header("Content-type: text/plain");
readfile($filename);

session_unset();
session_destroy();
?>
