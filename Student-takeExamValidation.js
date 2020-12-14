function submitExamID() { 

    var ExamID = document.getElementById('ExamID').value;

    if(ExamID==""){
        alert("PLEASE INPUT A VALID EXAM ID");
        return false;
    }else{
        return true;
    }
}