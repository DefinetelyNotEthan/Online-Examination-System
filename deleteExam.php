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

  $sql2 = "DELETE FROM question WHERE examID = $examID";
  $del2 = mysqli_query($connect, $sql2);
  if (!$del2) {
    die('Invalid query: ' . mysqli_error($connect));}

  $sql3 = "DELETE FROM answer WHERE examID = $examID";
  $del3 = mysqli_query($connect, $sql3);
  if (!$del3) {
    die('Invalid query: ' . mysqli_error($connect));}

  $sql4 = "DELETE FROM grade WHERE examID = $examID";
  $del4 = mysqli_query($connect, $sql4);
  if (!$del4) {
    die('Invalid query: ' . mysqli_error($connect));}

  header("Location: ExamList.php");

?>
