<?php
//include("../Controll/profileControll.php");
session_start();
if(empty($_SESSION["un"]))
{
  header("Location:../view/PatientLogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="../CSS/style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body align="center">
<img src="../image/afterlogin1.jpg" alt="logo" width="300" height="400">



  <?php
  echo $_SESSION["un"];
  ?>
<h1 align="center"><b><i>WELCOME TO OUR E-HEALTH WEBSITE</b></i></h1>
 
  
  <br><a href="../View/DoctorsList.php" class="button2 doctor"><b>Doctors List</b></a> <br>
  <br><a href="../View/det.php" class="button2 doctor"><b>DoctorsDetails</b></a> <br>
  <br><a href="../View/Fees.php" class="button2 fee"><b>Appointment Fee & Others</b></a> <br>
  <br><a href="../View/Appointment.php" class="button2 appointment"><b>Request For an Appointment</b></a> <br>
  <br><a href="../View/Ambulance.php" class="button2 ambulance"><b>Call Ambulance</b></a> <br>
  <br><a href="../Controll/profileControll.php" class="button2 profile"><b>View Profile</b></a> <br>
  <br><a href="../View/Update.php" class="button2 update"><b>Update</b></a> <br>
  <br><a href="../Controll/Delete.php" class="button2 delete" onclick="return confirm('Are you sure to delete?')" id="alert"><b>Delete</b></a> <br>

<br><p id="dcon"></p>

<button type="button" class="button3 Ajax" onclick="loadDoc()">Show Online Doctors</button>

  <br><a href="../View/Patientlogin.php" class="button2 logout"><b>LogOut</b></a> <br>
<ul>
  <li><br><a href="../View/Home.php" class="button2 home1" id="alert1"><b>Home</b></a> <br></li>
</ul>
  <?php
   include ("Footer.php");
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="../JavaScript/myscript.js"></script>
</body>
</html>
