<?php
include("../Controll/UpdateControll.php");

//$fname="";
//$lname=$Fname=$Mname=$un=$password=$Gender=$date=$age=$no=$address=$postcode=$ename=$RP=$eno=$WRTP=$fileUpload=$email="";
?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body >
    
    <form action="" method="POST" enctype="multipart/form-data">
    <table>
    <div class="sticky">
    <h1 align="center" id="up"> YOU CAN EDIT YOUR GIVEN INFORMATION HERE</h1>
</div>

    <tr align="center">
            
            <td for="fname"><b>Patient Name</b></td>
            
            <td>
                <input type="text" id="fname" name="fname" placeholder="Enter Patient's First name" value="<?php echo $fname?>" > <br>
                <input type="text" id="lname" name="lname" placeholder="Enter Patient's Last name" value="<?php echo $lname?>"><br>

            </td>




        </tr>
        <tr align="center">
                <td for="Fname"><b>Father Name</b></td>

                <td>
                    <input type="text" id="Fname" name="Fname" placeholder="Enter Patient's father name" value="<?php echo $Fname?>">

                </td>


            </tr>

            <tr align="center">
                <td for="Mname"><b>Mother name</b></td>
                <td>
                    <input type="text" id="Mname" name="Mname" placeholder="Enter Patient's mother name"  value="<?php echo $Mname?>">



                </td>

            </tr>


            <tr align="center">
                <td for="Userame"><b>Userame</b></td>
                <td>
                <input type="text" name="un"  placeholder="Enter username" value="<?php echo $un?>"><br>
                </td>
            </tr>

            <tr align="center">
                <td for="password"><b>Password</b></td>

                <td>
                    <input type="password" id="password" name="password" required placeholder="Enter Your 8 digit Password" value="<?php echo $password?>" minlength="8" maxlength="8">


                </td>
              </tr>

              <tr align="center">
                <td for="Gender"><b>Gender</b></td>
                <td>

                        <input type="radio" id="male" name="Gender" value="male">Male
                        <input type="radio" id="female" name="Gender" value="Female">Female
                        <input type="radio" id="other" name="Gender" value="other">other


                </td>
                <?php
            $Gender='';
                    if($Gender=="male")
                    {
                        $male="Checked";
                    }
                    if($Gender=="Female")
                    {
                        $Female="Checked";
                    }
                    else{
                        $other="checked";
                    }

                ?>
                

              </tr>
              
    
            <tr align ="center">

                <td><b>Date of birth</b></td>
                <td>

                <input type="date" id="date" name="date" value="<?php echo $date?>">
                </td>

            </tr>

            <tr align ="center">

                <td><b>Age</b></td>
                 <td>

                <input type="number" name="age" placeholder="Enter Patient's Age" value="<?php echo $age?>">
                </td>

            </tr>
            <tr align="Center">

            <td for="no"><b>Mobile number who tooks the patient</b></td>

            <td>
                 <input type="text" id="no" name="no"  placeholder="Enter Patient's Mobile No"  minlength="11" maxlength="11" value="<?php echo $no?>">
            </td>

            </tr>
            <tr align="center">
                <td for="Address"><b> Adress</b></td>

                <td>
                    <textarea input type="text" id="address" name="address" placeholder="Patient's Address" rows="4" cols="20" value="<?php echo $address?>"></textarea>
                </td>

              </tr>

              <tr align="center">
                <td for="postcode"><b>Postcode</b></td>

                <td>
                   <input type="number" id="postcode" name="postcode" placeholder="Enter Postcode" value="<?php echo $postcode?>">
                </td>
              </tr>

              <tr align="Center">
               
                  <td for="ename"><b>Emergency Contact name</b></td>

                <td>
                  <input type="text" id="ename" name="ename"  placeholder="Enter name" value="<?php echo $ename?>">
                </td>
              </tr>

             <tr align="Center">
                <td for="RP"><b>Relationship To patient</b></td>
                    <td>
                        <input type="text" id="RP" name="RP"  placeholder="who are you to the patient" value="<?php echo $RP?>">
                    </td>
            </tr>
                <tr align="Center">

                <td for="eno"><b>Emergency contact number</b></td>

                <td>
                    <input type="text" id="eno" name="eno"  placeholder="Enter Relative Mobile No" minlength="11" maxlength="11" value="<?php echo $eno?>">
                </td>
                </tr>

              
    <td><b><u><i>Additional Information</b></u></i></td>
                

              <tr align="center">
                <td for="WRTP"><b>Name of person who referred the patient's</b></td>
                    <td>
                        <input type="text" id="WRTP" name="WRTP" placeholder="Optional" value="<?php echo $WRTP?>">



                     </td>
              </tr>

            <tr align="center">
                <td for="fileUpload"><b>Upload Your Previous Prescription</b></td>
                    <td>
                        <input type="file" name="fileUpload" id="fileUpload" placeholder="upload your file here as pdf or image" value="<?php echo $fileUpload?>">
                    </td>
                    <td> <a href="<?php echo $fileUpload; ?>"> <?php echo $fileUpload;?></a>
                    <img src="">
                </td>
            </tr>

              <tr align="center">
                <td for="email"><b>EMail Id</b></td>

                <td>
                    <input type="email" id="email" name="email"  placeholder="Enter Your Email" value="<?php echo $email?>">


                </td>


              </tr>


            <tr align="center">
                <td>
                        <input type="submit" name="update" class="submit s">
                        <input type="reset" class="reset r"><br>
                        
                        <br><a href="../View/PatientProfile.php" class=" pre pr"><b>PREVIOUS</b></a> <br>

                </td>
            </tr>
    </table>

    </form>
    <?php
    include ("Footer.php");
    ?>
   
</body>
</html>