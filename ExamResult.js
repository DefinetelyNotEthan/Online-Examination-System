function showCheckedExam() {

	 	var myRequest = new XMLHttpRequest();
		myRequest.open("GET", "checkedExam.php", true);
		myRequest.send();
		myRequest.onload = function(){
			document.getElementById("uncheckedExamID_select").innerHTML = this.responseText;
		}
}

function showS() {

		var str = document.getElementById("uncheckedExamID_select").value;
		var myRequest = new XMLHttpRequest();
		myRequest.open("GET", "ExamStat.php?q="+str, true);
		myRequest.send();
		myRequest.onload = function(){
			document.getElementById("qList").innerHTML = this.responseText;	
	}
}


function showST() {

		var str = document.getElementById("thisStudent_select").value;
		var myRequest = new XMLHttpRequest();
		myRequest.open("GET", "checkedExamStudent.php?q="+str, true);
		myRequest.send();
		myRequest.onload = function(){
			document.getElementById("sList").innerHTML = this.responseText;	
	}
}