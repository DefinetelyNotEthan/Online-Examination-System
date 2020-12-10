function uncheckExam() {

	 	var myRequest = new XMLHttpRequest();
		myRequest.open("GET", "uncheckedExam.php", true);
		myRequest.send();
		myRequest.onload = function(){
			document.getElementById("uncheckedExamID_select").innerHTML = this.responseText;
		}
}

function showR() {

		var str = document.getElementById("examID_select").value;
	if (str == "") {
		document.getElementById("RList").innerHTML = "";
		return;
	} else {
		var myRequest = new XMLHttpRequest();
		myRequest.open("GET", "CheckExam.php?q="+str, true);
		myRequest.send();
		myRequest.onload = function(){
			document.getElementById("RList").innerHTML = this.responseText;
		}		
	}

}
