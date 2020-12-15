function showST() {

		var str = document.getElementById("ID").value;
		if (str.length == 5)
		{
			var myRequest = new XMLHttpRequest();
			myRequest.open("GET", "userInfo.php?q="+str, true);
			myRequest.send();
			myRequest.onload = function(){
			document.getElementById("sList").innerHTML = this.responseText;	
		}
	}
		else
		{
			alert ("Invalid user ID");
		}
		
	}

function deleteST() {

		var str = document.getElementById("ID").value;
		if (str.length == 5)
		{
			var myRequest = new XMLHttpRequest();
			myRequest.open("GET", "userDelete.php?q="+str, true);
			myRequest.send();
			myRequest.onload = function(){
			document.getElementById("qList").innerHTML = this.responseText;	
		}
	}
		else
		{
			alert ("Invalid user ID");
		}
		
	}

function addST() {

		var userID = document.getElementById("UID").value;
		var fName = document.getElementById("FN").value;
		var LName = document.getElementById("LN").value;
		var NName = document.getElementById("NN").value;
		var email = document.getElementById("EM").value;
		var password = document.getElementById("PW").value;
		var course = document.getElementById("COU").value;
		var bd = document.getElementById("BD").value;

		if (userID.length < 5)
		{
			alert ("userID is empty or wrong");
		}
		else if (fName == "")
		{
			alert ("First Name is empty");
		}

		else if (LName == "")
		{
			alert ("Last Name is empty");
		}
		else if (email == "")
		{
			alert ("Email is empty");
		}
		else if (password == "")
		{
			alert ("Password is empty");
		}
		else if (userID < 60000 && NName == "")
		{
			alert ("Nickname is empty for student");
		}
		else if (userID<60000 && bd == "")
		{
			alert ("Birthday is empty for student");
		}
		else if (userID>59999 && userID<90000 && course == "")
		{
			alert ("Course is empty for teacher");
		}
		else if (userID<60000  && course != "")
		{
			alert ("Course is only for teacher");
		}
		else{
			document.getElementById("modifyUser").submit();
		}

		
	}
	