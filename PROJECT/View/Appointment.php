<?php 
include ("../Controll/AppointmentControll.php");
?>	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body align="center">
        <?php 
        include ("PatientProfile.php");
        ?>	
         <form action="" method="POST">
    <table>
       
<tr align="center">
            <br>
            <td for="pname"><b>Patient Name</b></td>
            
            <td>
                <input type="text" id="pname" name="pname" placeholder="Enter Patient's First name">

            </td>
        </tr>

       
        <tr align="center">
                <td for="specialist"><b>Want to get an appointment of</b></td>

                <td>

                    <input type="radio" id="Dermatologists" name="specialist" value="Dermatologists">Dermatologists
                    <input type="radio" id="Cardiologists" name="specialist" value="Cardiologists">Cardiologists
                    <input type="radio" id="Endocrinologists" name="specialist" value="Endocrinologists">Endocrinologists


                </td>

              </tr>

<tr align="center">
                <td for="pdoctor"><b>Preferable Doctor's Name</b></td>

                <td>
                    <input type="text" id="pdoctor" name="pdoctor" placeholder="Enter Preferable doctor name">

                </td>
            </tr>
            <tr align="center">
                <td>
                    <input type="submit" name="submit">
                    <input type="reset"><br>
</td>
</tr>
</table>
</form>
</body>
</html>
