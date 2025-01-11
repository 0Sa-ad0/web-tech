//show type above
function show()
{
    document.getElementById("print").innerHTML=document.getElementById("un").value;
   
}
//functions for validation in javascript
function checkEmpty1()
    {
        if(document.getElementById("no").value=="")
        {
           
            return true;
        }
    }

function checkEmpty2()
{
    if(document.getElementById("eno").value=="" )
    {
        return true;
    }
}

function checkLength1()
    {
        var no=document.getElementById("no").value;
        if( no.length>11 || no.length<11  )
        {
            return true;
        }
    
       
    }

    function checkLength2()
    {
        var eno=document.getElementById("eno").value;
        if( eno.length>11 || eno.length<11)
        {
            return true;
        }
        
    }
    
    function checkPass()
    {
        var password=document.getElementById("password").value;
        if(password.length<8)
        {
            document.getElementById("paserror").innerHTML="Enter valid password";
            return true;
        }
    }

    function checkPassEmpty()
    {
        
        if(document.getElementById("password").value=="" || document.getElementById("password").value=="%")
        {
            document.getElementById("paserror").innerHTML="Enter valid password";
            return true;
        }
    }
//
function validate(){
    var no=document.getElementById("no").value;
    if(isNaN(no)){
    //document.getElementById("numloc").innerHTML="Enter Numeric value only";
    return true;
    }
    }

    function validate1(){
        var eno=document.getElementById("eno").value;
        if(isNaN(eno)){
        //document.getElementById("numloc").innerHTML="Enter Numeric value only";
        return true;
        }
        }

//


//js validation
function valid()
{
    
    if(document.getElementById("fname").value== "" || document.getElementById("fname").value== "+" || document.getElementById("fname").value== "-" || document.getElementById("fname").value== "*" || document.getElementById("fname").value== "/")
    {
        document.getElementById("error").innerHTML="Please enter your first name";
        return false;
    }
    if(document.getElementById("lname").value== "" || document.getElementById("lname").value== "+" || document.getElementById("lname").value== "-" || document.getElementById("lname").value== "*" || document.getElementById("lname").value== "/")
    {
        document.getElementById("error").innerHTML="Please enter your last name";
        return false;
    }
    if(document.getElementById("Fname").value== "" || document.getElementById("Fname").value== "+" || document.getElementById("Fname").value== "-" || document.getElementById("Fname").value== "*" || document.getElementById("Fname").value== "/" )
    {
        document.getElementById("error").innerHTML="Please enter your Father's name";
        return false;
    }
     if(document.getElementById("Mname").value== "" || document.getElementById("Mname").value== "+" || document.getElementById("Mname").value== "-" || document.getElementById("Mname").value== "*" || document.getElementById("Mname").value== "/")
    {
        document.getElementById("error").innerHTML="Please enter your Mother's name";
        return false;
    }

    if(document.getElementById("un").value== "" || document.getElementById("un").value== "+" || document.getElementById("un").value== "-" || document.getElementById("un").value== "*" || document.getElementById("un").value== "/" || document.getElementById("un").value== "%" || document.getElementById("un").value== "$" || document.getElementById("un").value== "!")
    {
        document.getElementById("uerror").innerHTML="Please enter your username or avoid operators and %!$";
        return false;
    }


    if(checkEmpty1()==true || checkLength1()==true || validate()==true)
 {
    document.getElementById("moerror").innerHTML="Please enter valid Mobile number & numeric number";
    return false;
    

 }

    
 if(checkEmpty2()==true || checkLength2()==true || validate1()==true)
 {
    document.getElementById("emoerror").innerHTML="Please enter valid Mobile number & numeric number";
    return false;
 }



 if(checkPass()==true || checkPassEmpty())
 {
    
    return false;
 }

       
}

//small to capital letter javascript
function blur1() {
    let x = document.getElementById("fname");
    x.value = x.value.toUpperCase();
    let y = document.getElementById("lname");
    y.value = y.value.toUpperCase();
    let z = document.getElementById("Fname");
    z.value = z.value.toUpperCase();
    let a = document.getElementById("Mname");
    a.value = a.value.toUpperCase();
    let b = document.getElementById("RP");
    b.value = b.value.toUpperCase();
    let c = document.getElementById("WRTP");
    c.value = c.value.toUpperCase();
  }

function blur2() {
    let l= document.getElementById("email");
    l.value = l.value.toLowerCase();
  }
  


//JQUERY of mouse enter[warning if someone wants to go home without login]
$(document).ready(function(){              //before finishing the loading of document jquery will not execute
    $("#alert1").mouseenter(function(){   //moving a mouse over an element: jquery syntax
      alert("Warning!please logout before leaving"); //alert jquery command box
    });
  });


//Ajax content
  function loadDoc() {
    var xhttp = new XMLHttpRequest();                 //request data from server,without refreshing the page| exchange data from server
    xhttp.open("GET", "../Controll/Ajx.txt", false);  //open(method, url, async) Specifies the type of request
    xhttp.send();                                    //Sends the request to the server (used for GET) 
    document.getElementById("dcon").innerHTML = xhttp.responseText; //responseText:get the response data as a JS string

  }

  

  function loadabout() {
    var xhttp = new XMLHttpRequest();                 //request data from server,without refreshing the page| exchange data from server
    xhttp.open("GET", "../Controll/Ajxab.txt", false);  //open(method, url, async) Specifies the type of request
    xhttp.send();                                    //Sends the request to the server (used for GET) 
    document.getElementById("about").innerHTML = xhttp.responseText; //responseText:get the response data as a JS string

  }

  function loadcon() {
    var xhttp = new XMLHttpRequest();                 //request data from server,without refreshing the page| exchange data from server
    xhttp.open("GET", "../Controll/Ajxcon.txt", false);  //open(method, url, async) Specifies the type of request
    xhttp.send();                                    //Sends the request to the server (used for GET) 
    document.getElementById("contact").innerHTML = xhttp.responseText; //responseText:get the response data as a JS string

  }
  function showpass() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";     //password to text for human readable
    } else {
      x.type = "password";
    }
  }

//js event onclick event - onclick event occurs when the user clicks on an HTML element.
  function confirmation(){
    var result = confirm();
   
}