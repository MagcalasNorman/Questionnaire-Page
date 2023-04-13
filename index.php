<?php
session_start();

if (isset($_SESSION['complete_name'])) {
  header('Location: quiz.php');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['complete_name'] = $_POST['complete_name'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['birthdate'] = $_POST['birthdate'];
  header('Location: quiz.php');
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Quiz Registration</title>
</head>
<body>
  <h1>Quiz Registration</h1>
  <form method="post">
    <label for="complete_name">Complete Name:</label>
    <input type="text" name="complete_name" required><br>

    <label for="email">Email Address:</label>
    <input type="email" name="email" required><br>

    <label for="birthdate">Birthdate:</label>
    <input type="date" name="birthdate" required><br>

    <button type="submit">Register</button>
  </form>
</body>
</html>
