<?php
include("../Model/docdata.php");
session_start();
$mydb=new docdata();
$conn=$mydb->openCon();
if(isset($_REQUEST['txt']))
{
    
$result=$mydb->getDocInfo($conn,$_REQUEST['txt']);
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

}
$_result=$mydb->doctorshow($conn,'doctor');
if($_result->num_rows > 0)
{
    echo "<table>";

    foreach($_result as $row)
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
