function disableConfirm(){
	//disable the buttons
	document.getElementById("createExamBtn").disabled = true;
}

function errorCheck()
{
	var errorflag = true;
	var msg = "check input";
		if(document.getElementById("examID").value =="ID is DATE+COURSE. eg: 310120203001" || document.getElementById("examID").value =="")
			{ alert("The examID is Empty")}
			else if(document.getElementById("examName").value == "")
				{ alert("The Exam Name is empty")}
			else if(document.getElementById("examDate").value == "")
				{ alert("The Exam Date is empty")}
			else if(document.getElementById("startTime").value == "")
				{ alert("The Starting Time is empty")}
			else if(document.getElementById("endTime").value == "")
				{ alert("The Deadline is empty")}
			else if(document.getElementById("endTime").value <document.getElementById("startTime").value )
				{ alert("The deadline must be after the starting time")}
			else{
				errorflag = false;}
		
	if (errorflag == false)
		{
			document.getElementById("createExamBtn").disabled = false;
			var str = document.getElementById("examID").value;
			var myRequest = new XMLHttpRequest();
			myRequest.open("GET", "examExists.php?q="+str, true);
			myRequest.send();
			myRequest.onload = function(){
			document.getElementById("searchResult").innerHTML = this.responseText;
			}		
		}
}

function addExam()
{
	document.getElementById('examDetails').submit();
}
