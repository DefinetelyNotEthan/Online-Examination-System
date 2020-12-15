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
  profilepic varchar(255) COLLATE utf8_unicode_ci,
  gender varchar(64),
  birthday varchar(64),
  course varchar(64),
  PRIMARY KEY (userID)
 ) ENGINE='MyISAM'  DEFAULT CHARSET='latin1'";

$addUsersRecords ="REPLACE INTO users (userID, roles, firstName, lastName, password, nickname, email, profilepic, gender, birthday, course) VALUES
(12345, 'student', 'Francesco', 'York', '12345fy', 'Franc', '12345@fake.com','default.png','Male','27/1/1998',null),
(23456, 'student', 'Neo', 'Whitehouse', '23456nw', 'Neo','23456@fake.com','neo_whitehouse.jpg', 'Male','25/2/1998',null),
(34567, 'student', 'Ruby-May',  'Miller', '34567rm', 'Ruby', '34567@fake.com','ruby_miller.jpg', 'Female','7/10/1998',null),
(45678, 'student', 'Dulcie', 'Luna', '45678dl', 'Dulcie', '45678@fake.com','dulcie_luna.jpg', 'Female', '2/12/1998',null),
(56789, 'student', 'Jasleen', 'Wood', '56789jw', 'Jas', '56789@fake.com','jasleen_wood.jpg','Female', '25/2/2000',null),
(67890, 'teacher', 'Cerys' , 'Blundell', '67890cb', 'Cerys', '67890@fake.com', 'cerys_blundell.jpg', 'Female',null,'EIE1001'),
(78901, 'teacher', 'Enrique', 'Armitage', '78901ea', 'Eric', '78901@fake.com', 'enrique.jpg', 'Male',null,'EIE1002'),
(89012, 'teacher', 'Denzel', 'Mcintyre', '89012dm', 'Denzel', '89012@fake.com', 'denzel.jpg', 'Male',null,'EIE1003'),
(90123, 'admin', 'Griffin','Nolan','90123gn', 'Griffin', '90123@fake.com', 'griffin.jpg', 'Male',null,null);";

$dropExamTable = "DROP TABLE IF EXISTS exam";

$createExamTable = "CREATE TABLE exam (
	userID int NOT NULL,
	examID varchar(64) NOT NULL,
	examName varchar(64) NOT NULL,
 	examDate varchar(64) NOT NULL,
	startTime varchar(64) NOT NULL,
  	endTime varchar(64) NOT NULL,
  	checked varchar(10),
  	CONSTRAINT CompKey_userID_examID PRIMARY KEY (userID, examID),
  	FOREIGN KEY (userID)
  		REFERENCES users(userID)
 ) ENGINE=MyISAM  DEFAULT CHARSET='latin1'";

$addExamRecords ="REPLACE INTO exam (userID, examID, examName, examDate, startTime, endTime, checked) VALUES
(67890, '151220201001', 'EIE 1001 Midterm', '2020-12-15', '12:00:00', '13:00:00','NO'),
(67890, '151220201002', 'EIE 1002 Midterm', '2020-12-13', '12:00:00', '13:00:00','NO');";

$dropQuestionTable = "DROP TABLE IF EXISTS question";

$createQuestionTable = "CREATE TABLE question (
	questionNum int NOT NULL,
	examID varchar(64) NOT NULL,
	Type varchar(64) NOT NULL,
 	question varchar(164) NOT NULL,
	answer varchar(164) NOT NULL,
  	points int NOT NULL,
  	option1 varchar(164),
  	option2 varchar(164),
  	option3 varchar(164),
  	option4 varchar(164),
  	CONSTRAINT CompKey_questionNum_examID PRIMARY KEY (questionNum, examID),
  	FOREIGN KEY (examID)
  		REFERENCES exam(examID)
 ) ENGINE=MyISAM  DEFAULT CHARSET='latin1'";

$addQuestionRecords ="REPLACE INTO question (questionNum, examID, Type, question, answer, points, option1, option2, option3, option4) VALUES
(1, '151220201001', 'Multiple Choice', '1+1', 'B', '10','1','2','3','4'),
(2, '151220201001', 'Multiple Choice', '1+2', 'C', '10','1','2','3','4'),
(3, '151220201001', 'Multiple Choice', '1+3', 'D', '10','1','2','3','4'),
(4, '151220201001', 'Multiple Choice', '2+2', 'D', '10','1','2','3','4'),
(5, '151220201001', 'Multiple Choice', '10+10', 'B', '10','10','20','30','40'),
(6, '151220201001', 'Multiple Choice', '10+20', 'C', '10','10','20','30','40'),
(7, '151220201001', 'Multiple Choice', '10+30', 'D', '10','10','20','30','40'),
(8, '151220201001', 'Multiple Choice', '20+20', 'D', '10','10','20','30','40'),
(9, '151220201001', 'T/F', 'Eddie is handsome?', 'T', '10','','','',''),
(10, '151220201001', 'T/F', 'Eddie is not handsome?', 'F', '10','','','',''),
(11, '151220201001', 'short', 'Who am I?', 'not Ethan', '10','','','','')
;";

$dropAnswerTable = "DROP TABLE IF EXISTS answer";

$createAnswerTable = "CREATE TABLE answer (
	questionNum int NOT NULL,
	examID varchar(64) NOT NULL,
	userID int NOT NULL,
  	userAnswer varchar(64),
  	result varchar(10),
  	CONSTRAINT CompKey_questionNum_examID_userID PRIMARY KEY (questionNum, examID, userID),
  	FOREIGN KEY (examID)
  		REFERENCES question(examID),
  	FOREIGN KEY (questionNum)
  		REFERENCES question(questionNum),
  	FOREIGN KEY (userID)
  		REFERENCES users(userID)
 ) ENGINE=MyISAM  DEFAULT CHARSET='latin1'";

 $addAnswerRecords ="REPLACE INTO answer (questionNum, examID, userID, userAnswer, result) VALUES
(1, '151220201001', 12345, 'D', ''),
(2, '151220201001', 12345, 'D', ''),
(3, '151220201001', 12345, 'D', ''),
(4, '151220201001', 12345, 'D', ''),
(5, '151220201001', 12345, 'D', ''),
(6, '151220201001', 12345, 'D', ''),
(7, '151220201001', 12345, 'D', ''),
(8, '151220201001', 12345, 'D', ''),
(9, '151220201001', 12345, 'T', ''),
(10,'151220201001', 12345, 'F', ''),
(11,'151220201001', 12345, 'idk', ''),
(1, '151220201001', 23456, 'B', ''),
(2, '151220201001', 23456, 'B', ''),
(3, '151220201001', 23456, 'B', ''),
(4, '151220201001', 23456, 'B', ''),
(5, '151220201001', 23456, 'B', ''),
(6, '151220201001', 23456, 'B', ''),
(7, '151220201001', 23456, 'B', ''),
(8, '151220201001', 23456, 'B', ''),
(9, '151220201001', 23456, 'F', ''),
(10,'151220201001', 23456, 'F', ''),
(11,'151220201001', 23456, 'idk', ''),
(1, '151220201001', 34567, 'C', ''),
(2, '151220201001', 34567, 'B', ''),
(3, '151220201001', 34567, 'C', ''),
(4, '151220201001', 34567, 'D', ''),
(5, '151220201001', 34567, 'B', ''),
(6, '151220201001', 34567, 'C', ''),
(7, '151220201001', 34567, 'B', ''),
(8, '151220201001', 34567, 'D', ''),
(9, '151220201001', 34567, 'F', ''),
(10,'151220201001', 34567, 'T', ''),
(11,'151220201001', 34567, 'notEthan', ''),
(1, '151220201001', 45678, 'C', ''),
(2, '151220201001', 45678, 'A', ''),
(3, '151220201001', 45678, 'C', ''),
(4, '151220201001', 45678, 'D', ''),
(5, '151220201001', 45678, 'B', ''),
(6, '151220201001',	45678, 'C', ''),
(7, '151220201001', 45678, 'B', ''),
(8, '151220201001', 45678, 'A', ''),
(9, '151220201001', 45678, 'F', ''),
(10,'151220201001', 45678, 'T', ''),
(11,'151220201001', 45678, 'not Ethan', '')
;";


$dropGradeTable = "DROP TABLE IF EXISTS grade";

$createGradeTable = "CREATE TABLE grade (
	examID varchar(64) NOT NULL,
	userID int NOT NULL,
  	grade int,
  	submitTime varchar(20),
  	CONSTRAINT CompKey_userID_examID PRIMARY KEY (userID, examID),
  	FOREIGN KEY (examID)
  		REFERENCES exam(examID),
  	FOREIGN KEY (userID)
  		REFERENCES users(userID)
 ) ENGINE=MyISAM  DEFAULT CHARSET='latin1'";

 $addGradeRecords ="REPLACE INTO grade (examID, userID, grade, submitTime) VALUES
('151220201001', 12345, '', '12:59:01'),
('151220201001', 23456, '', '12:59:04'),
('151220201001', 34567, '', '12:59:06'),
('151220201001', 45678, '', '12:59:08')
;";

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
					}else { $result = mysqli_query($connect, $addAnswerRecords);
						if (!$result) {
							die("Could not successfully run query ($addQuestionRecords) from $db: " .mysqli_error($connect) );
						}else {

			$result = mysqli_query($connect, $dropGradeTable);
				if (!$result) {
					die("Could not successfully run query ($dropGradeTable) from $db: " .mysqli_error($connect) );
				}else {
					$result = mysqli_query($connect, $createGradeTable);
					if (!$result) {
						die("Could not successfully run query ($createGradeTable) from $db: " .mysqli_error($connect) );
					}else { $result = mysqli_query($connect, $addGradeRecords);
						if (!$result) {
							die("Could not successfully run query ($addGradeRecords) from $db: " .mysqli_error($connect) );
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
}}}}}}}}}
mysqli_close($connect);   // close the connection
 
?>

