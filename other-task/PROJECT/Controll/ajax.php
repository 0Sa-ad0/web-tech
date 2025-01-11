<?php
/*include("../Model/docdata.php");
$_REQUEST["search"];
$mydb=new docdata();
$conobj=$mydb->openCon();
$result=$mydb->doctorshow($conobj,"patient",$data);

include("../Model/docdata.php");
session_start();
$mydb=new docdata();
$conn=$mydb->openCon();
//echo $_SESSION['un'];
$result=$mydb->doctorshow($conn,"doctor");
if($result->num_rows > 0)
{
    echo "<table>";

    foreach($result as $row)
    { 
        echo "<tr><td>DoctorName</td>" ."<td>".$row["DoctorName"]. "</td></tr>";
        echo  "<tr><td>Degree</td>"."<td>".$row["Degree"]."</td></tr>";
        echo  "<tr><td>HospitalName</td>"."<td>".$row["HospitalName"]."</td></tr>";
        echo  "<tr><td>Visitinghour</td>"."<td>".$row["VisitingHour"]."</td></tr>";
        echo  "<tr><td>Specialist</td>"."<td>".$row["Specialist"]."</td></tr>";
        echo  "<tr><td>......................................................</td>";
    }
}
?>
<a href="../View/PatientProfile.php" class="pre pr"><b>PREVIOUS PAGE</b></a> <br>
<link rel="stylesheet" type="text/css" href="../CSS/style.css">


<script src="../JavaScript/myscript.js"></script>
*/
?>
function loadDoc() {
    var xhttp = new XMLHttpRequest();                 //request data from server,without refreshing the page| exchange data from server
    xhttp.open("GET", "../Controll/Ajx.txt", false);  //open(method, url, async) Specifies the type of request
    xhttp.send();                                    //Sends the request to the server (used for GET) 
    document.getElementById("dcon").innerHTML = xhttp.responseText; //responseText:get the response data as a JS string

  }

  function showpass() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";     //password to text for human readable
    } else {
      x.type = "password";
    }
  }


