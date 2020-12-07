<?php 
session_start();

if (isset($_SESSION['userID']) && isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['firstName']; ?></h1>
     <a href="logout.php">Logout</a>
</body>
</html>

<?php 
}

else{
     header("Location: loginPage.php");
     exit();
}
 ?>