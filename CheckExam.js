function uncheckExam() {

	 	var myRequest = new XMLHttpRequest();
		myRequest.open("GET", "uncheckedExam.php", true);
		myRequest.send();
		myRequest.onload = function(){
			document.getElementById("uncheckedExamID_select").innerHTML = this.responseText;
		}
}

function showQ() {

		var str = document.getElementById("uncheckedExamID_select").value;
		var myRequest = new XMLHttpRequest();
		myRequest.open("GET", "CheckThisExam.php?q="+str, true);
		myRequest.send();
		myRequest.onload = function(){
			document.getElementById("qList").innerHTML = this.responseText;	
	}
}
