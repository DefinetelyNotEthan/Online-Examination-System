	<?php 
session_start();

if (isset($_SESSION['userID']) && isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {

 ?>
	<nav class="navbar navbar-expand-lg fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" id ="navTitle" href="#">Online Examination System</a>
	    </div>

	    <ul class="nav navbar-nav navbar-right">
	      <li><h3 id ="navWelcome"> Welcome,  <?php echo $_SESSION['firstName']." ".$_SESSION['lastName']; ?></h3></li>
			<li>		      <div class="dropdown show">
				  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

		
		<?php 
		include 'connect_database.php';
		if(!$connect) {
		die("Connection failed: " . mysqli_connect_error());
		}

		$ID = $_SESSION['userID'];

		$sql1 = "SELECT profilepic FROM users WHERE userID = $ID";
		$result = mysqli_query($connect, $sql1);
		if (!$result) {
	    die('Invalid query: ' . mysqli_error($connect));}
	    $row = mysqli_fetch_assoc($result);
	    $_SESSION['profilepic'] = "https://cdn.fastly.picmonkey.com/contentful/h6goo9gw1hh6/2sNZtFAWOdP1lmQ33VwRN3/24e953b920a9cd0ff2e1d587742a2472/1-intro-photo-final.jpg?w=800&q=70"
	    //"\"".$row['profilepic']."\"";
	    ?>
		<img src="<?php echo  $_SESSION['profilepic']; ?>" alt="Avatar" class="rounded-circle" alt="Cinque Terre" height ="40px" id ='profileIMG'>
				  </a>

				  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
				  	<ul>
				    	<li><a class="dropdown-item" href="">Edit Profile</a></li>
				    	<li><a class="dropdown-item" href="#">Change Password</a></li>
				    	<li><a class="dropdown-item" href="logout.php">Logout</a></li>
					</ul>
  				</div>
			</div>
			</li>
	   	</ul>
	  </div>
	</nav>

	<?php 
}

else{
     header("Location: loginPage.php");
     exit();
}
 ?>