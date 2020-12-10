		

<?php 
	session_start();
	$q =$_GET['q'];
	$_SESSION['examID'] = $q;

	// Connect to db
	include 'connect_database.php';

	// Find matching id
	$userQuery = "SELECT examID FROM exam WHERE examID = $q";
	$result = mysqli_query($connect, $userQuery);


	if (!$result) {
		die("Could not successfully run query.");
	}
	if (mysqli_num_rows($result) == 0) {
		print "No records were found, click create exam to make the exam";
	}else { 
		print "An exam with ID: " .$q. " is found. Click Create Exam to delete the previous version and make a new version.";				
	}
	mysqli_close($connect);

		?>