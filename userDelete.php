<?php
  // Connect to db
  session_start();
  $ID = $_GET['q'];
  include 'connect_database.php';
  if(!$connect) {
  die("Connection failed: " . mysqli_connect_error());
  }

  
  $sql6 = "SELECT * FROM users WHERE userID = $ID";
  $del6 = mysqli_query($connect, $sql6);
  if (mysqli_num_rows($del6) == 0) {
            print "User doesn't exist";
            }
  else {
  print "<p>Successfully Deleted. Refresh the page to see updated full list.</p>";


  $sql5 = "DELETE FROM users WHERE userID = $ID";
  $del5 = mysqli_query($connect, $sql5);
  if (!$del5) {
    die('Invalid query: ' . mysqli_error($connect));}



  $sql1 = "DELETE FROM exam WHERE userID = $ID";
  $del1 = mysqli_query($connect, $sql1);
  if (!$del1) {
    die('Invalid query: ' . mysqli_error($connect));}


  $sql3 = "DELETE FROM answer WHERE userID = $ID";
  $del3 = mysqli_query($connect, $sql3);
  if (!$del3) {
    die('Invalid query: ' . mysqli_error($connect));}

  $sql4 = "DELETE FROM grade WHERE userID = $ID";
  $del4 = mysqli_query($connect, $sql4);
  if (!$del4) {
    die('Invalid query: ' . mysqli_error($connect));}
}
  

?>
