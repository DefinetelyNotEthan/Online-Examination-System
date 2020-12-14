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

	