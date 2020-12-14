function submitForm() { 

    var loginID = document.getElementById('loginID').value;
    var FN = document.getElementById('FN').value;
    var LN = document.getElementById('LN').value;
    var NN = document.getElementById('NN').value;
    var EM = document.getElementById('EM').value;
    var PW = document.getElementById('PW').value;
    var COU = document.getElementById('COU').value;
    var GEN = document.getElementById('GEN').value;
    var BD = document.getElementById('BD').value;

    if(loginID=="" || loginID<10000 || loginID.length != 5){
        alert("PLEASE INPUT A VALID LOGIN ID with 5 DIGITS");
        return false;
    }else if(FN==""){
        alert("PLEASE INPUT A VALID First Name");
        return false;
    }else if(LN==""){
        alert("PLEASE INPUT A VALID Last Name");
        return false;
    }else if(NN==""){
        alert("PLEASE INPUT A VALID Nick Name");
        return false;
    }else if(EM==""){
        alert("PLEASE INPUT A VALID Email Address");
        return false;
    }else if(PW==""){
        alert("PLEASE INPUT A VALID PASSWORD");
        return false;
    }else if(COU=="" && loginID>=60000){
        alert("PLEASE INPUT A VALID COURSE NUMBER");
        return false;
    }else if(COU!=="" && loginID<60000){
        alert("COURSE NUMBER SHOULD BE INPUT BY A TEACHER. IF YOU ARE A STUDENT, PLEASE LEAVE THIS BLANK");
        document.getElementById("COU").value = "";
        return false;
    }else if(GEN!=="" && loginID>=60000){
        alert("GENDER SHOULD BE INPUT BY A STUDENT. IF YOU ARE A TEACHER, PLEASE LEAVE THIS BLANK");
        document.getElementById("GEN").value = "";
        return false;
    }else if(GEN!=="" && loginID<60000 && GEN!=="M" && GEN!=="F"){
        alert("PLEASE INPUT A VALID GENDER WITH LETTER 'M' OR 'F'");
        document.getElementById("GEN").value = "";
        return false;
    }else if(GEN=="" && loginID<60000){
        alert("PLEASE INPUT A VALID GENDER");
        return false;
    }else if(BD!=="" && loginID>=60000){
        alert("BIRTHDAY SHOULD BE INPUT BY A STUDENT. IF YOU ARE A TEACHER, PLEASE LEAVE THIS BLANK");
        document.getElementById("BD").value = "";
        return false;
    }else if(BD=="" && loginID<60000){
        alert("PLEASE INPUT A VALID BIRTHDAY");
        return false;
    }else{
        return true;
    }
}