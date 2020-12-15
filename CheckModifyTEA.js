function addTEA() {

    var fName = document.getElementById("FN").value;
    var LName = document.getElementById("LN").value;
    var NName = document.getElementById("NN").value;
    var email = document.getElementById("EM").value;
    var password = document.getElementById("PW").value;
    var COU = document.getElementById("COU").value;

    
    if (fName == "")
    {
        alert ("First Name is empty");
    }

    else if (LName == "")
    {
        alert ("Last Name is empty");
    }
    else if (email == "")
    {
        alert ("Email is empty");
    }
    else if (password == "")
    {
        alert ("Password is empty");
    }
    else if (NName == "")
    {
        alert ("Nickname is empty");
    }
    else if (COU == "")
    {
        alert ("Course is empty");
    }
    else{
        document.getElementById("modifyUser").submit();
    }

    
}


function addAD() {

    var fName = document.getElementById("FN").value;
    var LName = document.getElementById("LN").value;
    var NName = document.getElementById("NN").value;
    var email = document.getElementById("EM").value;
    var password = document.getElementById("PW").value;

    
    if (fName == "")
    {
        alert ("First Name is empty");
    }

    else if (LName == "")
    {
        alert ("Last Name is empty");
    }
    else if (email == "")
    {
        alert ("Email is empty");
    }
    else if (password == "")
    {
        alert ("Password is empty");
    }
    else if (NName == "")
    {
        alert ("Nickname is empty");
    }
    else{
        document.getElementById("modifyUser").submit();
    }

    
}