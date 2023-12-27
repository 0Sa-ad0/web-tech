<?php
include("../Model/database.php");
session_start();
$mydb=new database();
$conn=$mydb->openCon();
echo $_SESSION['un'];
$result=$mydb->showDetails($conn,"patientregistrationdata",$_SESSION["un"]);
if($result->num_rows > 0)
{
    echo "<table>";

    foreach($result as $row)
    {
        echo "<tr><td>FirstNAme</td>" ."<td>".$row["FirstName"]. "</td></tr>";
        echo  "<tr><td>LastNAme</td>"."<td>".$row["LastName"]."</td></tr>";
        echo  "<tr><td>FatherNAme</td>"."<td>".$row["FatherName"]."</td></tr>";
        echo  "<tr><td>MotherNAme</td>"."<td>".$row["MotherName"]."</td></tr>";
        echo  "<tr><td>Username</td>"."<td>".$row["Username"]."</td></tr>";
        echo  "<tr><td>Password</td>"."<td>".$row["Password"]."</td></tr>";
        echo  "<tr><td>Gender</td>"."<td>".$row["Gender"]."</td></tr>";
        echo  "<tr><td>DateOfBirth</td>"."<td>".$row["DateofBirth"];
        echo  "<tr><td>Age</td>"."<td>".$row["Age"]."</td></tr>";
        echo  "<tr><td>MobileNumber</td>"."<td>".$row["MobileNumber"]."</td></tr>";
        echo  "<tr><td>Address</td>"."<td>".$row["Address"]."</td></tr>";
        echo  "<tr><td>Postcode</td>"."<td>".$row["Postcode"]."</td></tr>";
        echo  "<tr><td>EmergencyContactName</td>"."<td>".$row["EmergencyContactName"]."</td></tr>";
        echo  "<tr><td>RelationToPatient</td>"."<td>".$row["RelationshipToPatient"]."</td></tr>";
        echo  "<tr><td>EmergencyContactNumber</td>"."<td>".$row["EmergencyContactNumber"]."</td></tr>";
        echo  "<tr><td>Reffered</td>"."<td>".$row["Reffered"]."</td></tr>";
        echo  "<tr><td>Prescription</td>"."<td>".$row["Prescription"]."</td></tr>";
        echo  "<tr><td>Email</td>"."<td>".$row["EMail"]."</td></tr>";
    }
    echo "</table>";
}
$conn->close();
?>
<br><a href="../View/PatientProfile.php" class="pre pr"><b>PREVIOUS PAGE</b></a> <br>
<link rel="stylesheet" type="text/css" href="../CSS/style.css">