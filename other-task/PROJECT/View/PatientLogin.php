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

  <table>
    <form action="../Controll/loginPass.php" method="POST">
    <img src="../image/welcome.jpg" alt="welcome" width="300" height="400" id="img">
    
    <tr >
       <td for="Userame"><b>Userame</b>
     
        <input type="text" name="un"  placeholder="Enter username"><br>
    </td>
</tr>
           <tr >
                <td for="password"><b>Password</b>

              
                    <input type="password" id="password" name="password"  placeholder="Enter Your 8 digit Password"  maxlength="12">
                    <input type="checkbox" onclick="showpass()">Show Password
                    <input type="checkbox" name="cookies" /> Accept Cookies
              
                </td>
              
              
              </tr>

             
    <tr align="center">
        <td>
            <button type="submit" class="button" name="submit">Login</button>
            <td><a href="../View/Home.php" class="button">HOME</a></td>
        </td>
    </tr>
    <tr>
                
    </form>
  </table>
</body>
</html>
<html>
<script src="../JavaScript/myscript.js"></script>
  <body>
  <br><a href="../View/PatientRegistration.php"  class="rf"> Return Registration form</a> <br>
  </body>
      
     </html>

     <?php
    include ("Footer.php");
    ?>