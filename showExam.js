function showExam() {

	 	var myRequest = new XMLHttpRequest();
		myRequest.open("GET", "displayExam.php", true);
		myRequest.send();
		myRequest.onload = function(){
			document.getElementById("examID_select").innerHTML = this.responseText;
		}
}

function showQ() {

		var str = document.getElementById("examID_select").value;
	if (str == "") {
		document.getElementById("txtHint").innerHTML = "";
		return;
	} else {
		var myRequest = new XMLHttpRequest();
		myRequest.open("GET", "displayQuestion.php?q="+str, true);
		myRequest.send();
		myRequest.onload = function(){
			document.getElementById("qList").innerHTML = this.responseText;
		}		
	}

}

function qType(){
    var str = document.getElementById("Qtype").value;
    var url = "QuestionType.php";
    $.post(url,{contentVar:str},function(data){
      $("#options").html(data).show();
      });
    }

function errorCheck()
{
    var errorflag = true;
    if(document.getElementById("question").value =="")
      { alert("The Question is Empty")}
      else if(document.getElementById("marks").value == "")
        { alert("The mark is empty")}
   		 else if(document.getElementById("qNum").value == "")
        { alert("The Question Number is empty")}
      else{
        errorflag = false;}
    
  if (errorflag == false)
    {
      document.getElementById('addQForm').submit();
      }   
 }
  