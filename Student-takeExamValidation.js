function submitExamID() { 

    var ExamID = document.getElementById('ExamID').value;

    if(ExamID==""){
        alert("PLEASE INPUT A VALID EXAM ID");
    }else{
        document.getElementById("takeExam").submit();
    }
}