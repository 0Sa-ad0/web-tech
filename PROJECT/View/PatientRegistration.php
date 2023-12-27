<?php
include("../Controll/Registration.php");
?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body >

    <form name= "form" action="" method="POST" enctype="multipart/form-data" onsubmit="return valid()">
    <table id="fixed">
    <div class="sticky">
    <h1 align="center" class="sticky">NEW PATIENT'S REGISTRATION FORM</h1>
</div>
            <img src="../image/logo.jpg" alt="logo" width="200" height="300">

    <tr align="center">
    <p id="print"></p>
            <td for="fname"><b>Patient Name</b></td>
            
            <td>
            <p id="error"></p>
                <input type="text" id="fname" name="fname" placeholder="Enter Patient's First name" onblur="blur1()">
            <p id="error"></p>
                <input type="text" id="lname" name="lname" placeholder="Enter Patient's Last name" onblur="blur1()">

            </td>




        </tr>
        <tr align="center">
                <td for="Fname"><b>Father Name</b></td>

                <td>
                <p id="error"></p>
                    <input type="text" id="Fname" name="Fname" placeholder="Enter Patient's father name" onblur="blur1()">

                </td>


            </tr>

            <tr align="center">
                <td for="Mname"><b>Mother name</b></td>
                <td>
                <p id="error"></p>
                    <input type="text" id="Mname" name="Mname" placeholder="Enter Patient's mother name" onblur="blur1()">



                </td>

            </tr>


            <tr align="center">
                <td for="Userame"><b>Userame</b></td>
                <td>
                <p id="uerror"></p> 
                <input type="text" name="un" id="un"  placeholder="Enter username" onkeyup="show()"><br>
                </td>
            </tr>

            <tr align="center">
                <td for="password"><b>Password</b></td>
                
                <td>
                <p id="paserror"></p>
                    <input type="password" id="password" name="password"  placeholder="Enter Your 8 digit Password"  maxlength="12" >


                </td>
              </tr>

              <tr align="center">
                <td for="Gender"><b>Gender</b></td>

                <td>

                    <input type="radio" id="male" name="Gender" value="male">Male
                    <input type="radio" id="female" name="Gender" value="Female">Female
                    <input type="radio" id="other" name="Gender" value="other">other


                </td>

              </tr>
              
    
            <tr align ="center">

                <td><b>Date of birth</b></td>
                <td>

                <input type="date" id="date" name="date">
                </td>

            </tr>

            <tr align ="center">

                <td><b>Age</b></td>
                 <td>
                 <p id="ageerror"></p>
                <input type="number" name="age"  placeholder="Enter Patient's Age">
                </td>

            </tr>
            <tr align="Center">

            <td for="no"><b>Mobile number who tooks the patient</b></td>

            <td>
            <p id="moerror"></p>
                 <input type="text" id="no" name="no"   placeholder="Enter Patient's Mobile No"  >
            </td>

            </tr>
            <tr align="center">
                <td for="Address"><b> Adress</b></td>

                <td>
                <p id="aderror"></p>
                    <textarea input type="text" id="address" name="address"  placeholder="Patient's Address" rows="4" cols="50"></textarea>
                </td>

              </tr>

              <tr align="center">
                <td for="postcode"><b>Postcode</b></td>

                <td>
                <p id="posterror"></p>
                   <input type="number" id="postcode" name="postcode" placeholder="Enter Postcode" >
                </td>
              </tr>

              <tr align="Center">
               
                  <td for="Ename"><b>Emergency Contact name</b></td>

                <td>
                  <input type="text" id="Ename" name="Ename"  placeholder="Enter name" >
                </td>
              </tr>

             <tr align="Center">
                <td for="RP"><b>Relationship To patient</b></td>
                    <td>
                        <input type="text" id="RP" name="RP"  placeholder="who are you to the patient" onblur="blur1()">
                    </td>
            </tr>
                <tr align="Center">

                <td for="eno"><b>Emergency contact number</b></td>

                <td>
                    <p id="emoerror"></p>
                    <input type="text" id="eno" name="eno"   placeholder="Enter Relative Mobile No" minlength="11" maxlength="11">
                </td>
                </tr>

              
    <td><b><u><i>Additional Information</b></u></i></td>
                <tr align="center">
                    <td for="Referred"><b>Referred by</b></td>

                        <td>

                            <input type="checkbox" id="Doctor" name="Doctor" value="Doctor">Doctor
                            <input type="checkbox" id="Family" name="Family" value="Family">Family
                            <input type="checkbox" id="Internet" name="Internet" value="Internet">Internet
                            <input type="checkbox" id="Other" name="Other" value="Other">Other


                </td>

              </tr>

              <tr align="center">
                <td for="WRTP"><b>Name of person who referred the patient's</b></td>
                    <td>
                        <input type="text" id="WRTP" name="WRTP" placeholder="Optional" onblur="blur1()">



                     </td>
              </tr>

            <tr align="center">
                <td for="fileUpload"><b>Upload Your Previous Prescription</b></td>
                    <td>
                        <input type="file" name="fileUpload" id="fileUpload" placeholder="upload your file here as pdf or image">
                    </td>
            </tr>

              <tr align="center">
                <td for="email"><b>EMail Id</b></td>

                <td>
                <p id="emailerror"></p>
                    <input type="text" id="email" name="email" onblur="blur2()" placeholder="Enter Your Email" >


                </td>


              </tr>


            <tr align="center">
                <td>
                        <input type="submit" name="submit" class="submit s">
                        <input type="reset" class="reset r"><br>
                        
                        <ul>
            <li><a href="http://localhost/PROJECT/View/PatientLogin.php" class="AFLG af"><b>Is Your Registration Done? LOG IN<b></a></li>
                     

            </ul>

                </td>
            </tr>
          
<ul>
            <li><button type="button" class="hhm cuu" id="contact" onclick="loadcon()"><b>Contact With Us<b></a></li>
            <li><button type="button" class="hhm auu" id="about" onclick="loadabout()"><b>About Us<b></a></li>
            <li> <a href="../View/Home.php" class="hhmm lgg"><b>HOME</b></a></li>
</ul>

    
    </table>
    </form>
    <script src="../JavaScript/myscript.js"></script>
    <?php
    include ("Footer.php");
    ?>
   
</body>
</html>