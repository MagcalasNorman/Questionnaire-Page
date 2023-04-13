<?php
session_start();

if (!isset($_SESSION['complete_name'])) {
  header('Location: index.php');
  exit();
}

$questions = [
  [
    'question' => 'What is the capital of the Philippines?',
    'choices' => ['Manila', 'Quezon', 'Pampange', 'Guagua'],
    'answer' => 0,
  ],
  [
    'question' => 'What is the largest country in the world?',
    'choices' => ['China', 'Russia', 'Canada', 'United States'],
    'answer' => 1,
  ],
  [
    'question' => 'How Many Continents in the Earth?',
    'choices' => ['2', '5', '7', '12'],
    'answer' => 2,
  ],
  [
    'question' => 'What is the 5x5?',
    'choices' => ['15', '35', '5', '25'],
    'answer' => 3,
  ],
  [
    'question' => 'How many days are in February during a leap year?',
    'choices' => ['28', '29', '30', '31'],
    'answer' => 2,
  ],
  [
    'question' => 'What does the “U” stand for in “UFO”?',
    'choices' => ['Unidentified', 'Under', 'United', 'Unique'],
    'answer' => 0,
  ],
  [
    'question' => 'How many sides does a hexagon have?',
    'choices' => ['5', '6', '7', '8'],
    'answer' => 1,
  ],
  [
    'question' => 'What was the name of the Greek mythological woman who had snakes for hair?',
    'choices' => ['Pandora', 'Helen', 'Cassiopeia', 'Medusa'],
    'answer' => 3,
  ],
  [
    'question' => 'How often does the moon orbit the Earth?',
    'choices' => ['every 7 days', 'every 27 days', 'every 30 days', ' every 365 days'],
    'answer' => 3,
  ],
  [
    'question' => 'In Greek Mythology, who is the Queen of the Underworld?',
    'choices' => ['Pandora', 'Helen', 'Persephone', 'Medusa'],
    'answer' => 2,
  ],
];

$num_questions = count($questions);
$question_number = isset($_SESSION['question_number']) ? $_SESSION['question_number'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $answer = $_POST['answer'];
  $_SESSION['answers'][$question_number] = $answer;

  $question_number++;
  $_SESSION['question_number'] = $question_number;

  if ($question_number === $num_questions) {
    header('Location: result.php');
    exit();
  }
}

$current_question = $questions[$question_number];
$question = $current_question['question'];
$choices = $current_question['choices'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Quiz</title>
</head>
<body>
  <h1>Quiz</h1>
  <p>Question <?php echo $question_number + 1; ?> of <?php echo $num_questions; ?>:</p>
  <p><?php echo $question; ?></p>
  <form method="post">
    <?php foreach ($choices as $key => $choice): ?>
      <input type="radio" name="answer" value="<?php echo $key; ?>" id="<?php echo $key; ?>" required>
      <label for="<?php echo $key; ?>"><?php echo $choice; ?></label><br>
    <?php endforeach; ?>
    <button type="submit">Next</button>
  </form>
</body>
</html>
