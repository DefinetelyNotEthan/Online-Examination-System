var qNum = 1;

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
      else{
        errorflag = false;}
    
  if (errorflag == false)
    {
      document.getElementById('addQForm').submit();
      }   
    }

  function prevQ(){
    document.getElementById('prevQForm').submit();
  }
