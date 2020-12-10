<?php
  // Connect to db
  session_start();
  include 'connect_database.php';
  if(!$connect) {
  die("Connection failed: " . mysqli_connect_error());
  }

  $ID = $_SESSION['userID'];
  $examID = $_SESSION['examID'];

  $sql1 = "DELETE FROM exam WHERE (userID = $ID AND examID = $examID)";
  $del1 = mysqli_query($connect, $sql1);
  if (!$del1) {
    die('Invalid query: ' . mysqli_error($connect));}

  $sql1 = "DELETE FROM question WHERE examID = $examID";
  $del1 = mysqli_query($connect, $sql1);
  if (!$del1) {
    die('Invalid query: ' . mysqli_error($connect));}

  header("Location: ExamList.php");

?>
