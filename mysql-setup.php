<?php
$server = "localhost";
$user = "root";
if (!empty($_POST['rootPW']))
	$pw = $_POST['rootPW'];
elseif ($_POST['server'] =="mamp")
	$pw = "root";
else 
	$pw = ""; // by default xammp root user has no password

$db = "exam_platform";

$connect=mysqli_connect($server, $user, $pw, $db);

if(!$connect) {
	die("ERROR: Cannot connect to database $db on server $server 
	using user name $user (".mysqli_connect_errno().
	", ".mysqli_connect_error().")");
}

$createAccount="GRANT ALL PRIVILEGES ON exam_platform.* TO 'wbip'@'localhost' IDENTIFIED BY 'wbip123' WITH GRANT OPTION";

// need this at start of the create table scripts? SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

$dropUsersTable = "DROP TABLE IF EXISTS users";

$createUsersTable = "CREATE TABLE users (
  userID int NOT NULL,
  roles varchar(10) NOT NULL,
  firstName varchar(64) NOT NULL,
  lastName varchar(64) NOT NULL,
  password varchar(64) NOT NULL,
  nickname varchar(64),
  email varchar(64),
  profilepic varchar(64),
  gender varchar(64),
  birthday varchar(64),
  course varchar(64),
  PRIMARY KEY (userID),
  UNIQUE KEY userID (userID)
 ) ENGINE='MyISAM'  DEFAULT CHARSET='latin1'";

$addUsersRecords ="REPLACE INTO users (userID, roles, firstName, lastName, password, nickname, email, profilepic, gender, birthday, course) VALUES
(12345, 'student', 'Francesco', 'York', '12345fy', 'Franc', '12345@fake.com','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgfctOQPcfZMAIBzJqKiDa9LUY8SmuSGff_g&usqp=CAU','Male','27/1/1998',null),
(23456, 'student', 'Neo', 'Whitehouse', '23456nw', 'Neo','23456@fake.com','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdX7wWCMOvGYD6_4-MthVKf-DjjgLF_GqQzg&usqp=CAU', 'Male','25/2/1998',null),
(34567, 'student', 'Ruby-May',  'Miller', '34567rm', 'Ruby', '34567@fake.com','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyEaZqT3fHeNrPGcnjLLX1v_W4mvBlgpwxnA&usqp=CAU', 'Female','7/10/1998',null),
(45678, 'student', 'Dulcie', 'Luna', '45678dl', 'Dulcie', '45678@fake.com','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKYZ06dLHWPoo4JqBY2jIstouDIXp1wHKbsg&usqp=CAU', 'Female', '2/12/1998',null),
(56789, 'student', 'Jasleen', 'Wood', '56789jw', 'Jas', '56789@fake.com','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTn2J4ZkgwHy9Mb5R5_i4tfeBKVUmJj-iP1dw&usqp=CAU','Female', '1/1/1999',null),
(67890, 'teacher', 'Cerys' , 'Blundell', '67890cb', 'Cerys', '67890@fake.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAP4Zo4Iwsc08rxjj4xS4p28lQKb8hlw85ng&usqp=CAU', 'Female',null,'EIE1001'),
(78901, 'teacher', 'Enrique', 'Armitage', '78901ea', 'Eric', '78901@fake.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvxDrCR5SfO2zzeBNLF9U9xbjlC8-ToAA68g&usqp=CAU', 'Male',null,'EIE1002'),
(89012, 'teacher', 'Denzel', 'Mcintyre', '89012dm', 'Denzel', '89012@fake.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGqeiMvcMA8ATx6McIgv0QgGq9njL6_9Q9Ww&usqp=CAU', 'Male',null,'EIE1003'),
(90123, 'admin', 'Griffin','Nolan','90123gn', 'Griffin', '90123@fake.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXU60XpA0zHd_GktQO0YfR5bfr2xr6ADFfeA&usqp=CAU', 'Male',null,null);";

$dropExamTable = "DROP TABLE IF EXISTS exam";

$createExamTable = "CREATE TABLE exam (
	userID int NOT NULL,
	examID int NOT NULL,
	examName varchar(10) NOT NULL,
 	examDate varchar(10) NOT NULL,
	startTime varchar(64) NOT NULL,
  	endTime varchar(64) NOT NULL,
  	qNum int NOT NULL,
  	PRIMARY KEY (userID, examID),
  	UNIQUE KEY userID (userID),
  	FOREIGN KEY (userID)
  		REFERENCES users(userID)
 ) ENGINE=MyISAM  DEFAULT CHARSET='latin1'";

$addExamRecords ="REPLACE INTO exam (userID, examID, examName, examDate, startTime, endTime, qNum) VALUES
(67890, 151220201001, 'EIE 1003 Midterm', '15/12/2020', '12:00', '13:00','10');";

$dropQuestionTable = "DROP TABLE IF EXISTS question";

$createQuestionTable = "CREATE TABLE question (
	questionNum int NOT NULL,
	examID int NOT NULL,
	Type varchar(10) NOT NULL,
 	question varchar(64) NOT NULL,
	answer varchar(64) NOT NULL,
  	points int NOT NULL,
  	option1 varchar(64),
  	option2 varchar(64),
  	option3 varchar(64),
  	option4 varchar(64),
  	PRIMARY KEY (questionNum, examID),
  	FOREIGN KEY (examID)
  		REFERENCES exam(examID)
 ) ENGINE=MyISAM  DEFAULT CHARSET='latin1'";

$addQuestionRecords ="REPLACE INTO question (questionNum, examID, Type, question, answer, points, option1, option2, option3, option4) VALUES
(1, 151220201001, 'Multiple Choice', '1+1', '2', '10','1','2','3','4'),
(2, 151220201001, 'Multiple Choice', '1+2', '3', '10','1','2','3','4'),
(3, 151220201001, 'Multiple Choice', '1+3', '4', '10','1','2','3','4'),
(4, 151220201001, 'Multiple Choice', '2+2', '4', '10','1','2','3','4'),
(5, 151220201001, 'Multiple Choice', '10+10', '20', '10','10','20','30','40'),
(6, 151220201001, 'Multiple Choice', '10+20', '30', '10','10','20','30','40'),
(7, 151220201001, 'Multiple Choice', '10+30', '40', '10','10','20','30','40'),
(8, 151220201001, 'Multiple Choice', '20+20', '40', '10','10','20','30','40'),
(9, 151220201001, 'T/F', 'Eddie is handsome?', 'true', '10','true','false','',''),
(10, 151220201001, 'T/F', 'Eddie is not handsome?', 'false', '10','true','false','','')
;";

$dropAnswerTable = "DROP TABLE IF EXISTS answer";

$createAnswerTable = "CREATE TABLE answer (
	questionNum int NOT NULL,
	examID int NOT NULL,
	userID int NOT NULL,
  	userAnswer varchar(64),
  	PRIMARY KEY (questionNum, examID, userID),
  	FOREIGN KEY (examID)
  		REFERENCES question(examID),
  	FOREIGN KEY (questionNum)
  		REFERENCES question(questionNum),
  	FOREIGN KEY (userID)
  		REFERENCES users(userID)
 ) ENGINE=MyISAM  DEFAULT CHARSET='latin1'";

$dropGradeTable = "DROP TABLE IF EXISTS grade";

$createGradeTable = "CREATE TABLE grade (
	examID int NOT NULL,
	userID int NOT NULL,
  	grade varchar(64),
  	PRIMARY KEY (examID, userID),
  	FOREIGN KEY (examID)
  		REFERENCES exam(examID),
  	FOREIGN KEY (userID)
  		REFERENCES users(userID)
 ) ENGINE=MyISAM  DEFAULT CHARSET='latin1'";

$result = mysqli_query($connect, $createAccount);

if (!$result) 
{
	die("Could not successfully run query ($createAccount) from $db: " .	
		mysqli_error($connect) );
}
else{
	$result = mysqli_query($connect, $dropUsersTable);
	if (!$result){
		die("Could not successfully run query ($dropUsersTable) from $db: " . mysqli_error($connect) );
	}else  {
		$result = mysqli_query($connect, $createUsersTable);
		if (!$result) {
			die("Could not successfully run query ($createUsersTable) from $db: " .mysqli_error($connect) );
		}
		else{
			$result = mysqli_query($connect, $addUsersRecords);
		
			if (!$result) {
				die("Could not successfully run query ($addUsersRecords) from $db: " .mysqli_error($connect) );
			}else {
				$result = mysqli_query($connect, $dropExamTable);
				if (!$result) {
					die("Could not successfully run query ($dropExamTable) from $db: " .mysqli_error($connect) );
				}else {
					$result = mysqli_query($connect, $createExamTable);
					if (!$result) {
						die("Could not successfully run query ($createExamTable) from $db: " .mysqli_error($connect) );
					}else {
						$result = mysqli_query($connect, $addExamRecords);
						if (!$result) {
							die("Could not successfully run query ($addExamRecords) from $db: " .mysqli_error($connect) );
						}else {

			$result = mysqli_query($connect, $dropQuestionTable);
				if (!$result) {
					die("Could not successfully run query ($dropQuestionTable) from $db: " .mysqli_error($connect) );
				}else {
					$result = mysqli_query($connect, $createQuestionTable);
					if (!$result) {
						die("Could not successfully run query ($createQuestionTable) from $db: " .mysqli_error($connect) );
					}else {
						$result = mysqli_query($connect, $addQuestionRecords);
						if (!$result) {
							die("Could not successfully run query ($addQuestionRecords) from $db: " .mysqli_error($connect) );
						}else {


			$result = mysqli_query($connect, $dropAnswerTable);
				if (!$result) {
					die("Could not successfully run query ($dropAnswerTable) from $db: " .mysqli_error($connect) );
				}else {
					$result = mysqli_query($connect, $createAnswerTable);
					if (!$result) {
						die("Could not successfully run query ($createAnswerTable) from $db: " .mysqli_error($connect) );
					}else {

			$result = mysqli_query($connect, $dropGradeTable);
				if (!$result) {
					die("Could not successfully run query ($dropGradeTable) from $db: " .mysqli_error($connect) );
				}else {
					$result = mysqli_query($connect, $createGradeTable);
					if (!$result) {
						die("Could not successfully run query ($createGradeTable) from $db: " .mysqli_error($connect) );
					}else {

							print("<html><head><title>MySQL Setup</title></head>
							<body><h1>MySQL Setup: SUCCESS!</h1><p>Created MySQL user <strong>wbip</strong> with 
							password <strong>wbip123</strong>, with all privileges on the 
							<strong>exam_platform</strong> database.</p><p>Created tables in the 
							<strong>exam_platform</strong> database.</p>
							</body></html>");
						}
					}
				}
			}
		}
	}
}
}}}}}}}
mysqli_close($connect);   // close the connection
 
?>

