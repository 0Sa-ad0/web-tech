
<?php
    include("../Model/database.php");
    //$hasError=0;
 /*
   if(!empty($_POST["cookies"])) {
      setcookie ("username",$_POST["un"],time()+ (86400*30));
      setcookie ("password",$_POST["password"],time()+ (86400*30));
      echo "Cookies Set Successfuly";
    } else {
      
      echo "Cookies Not Set";
    }
  

      if(isset($_REQUEST["submit"]))
    {
      if($_REQUEST["un"]=="" )
        {
          echo "<b>Username invalid</b>";
          echo"<br>";
      
       }
      else
        {
          echo $_REQUEST["un"];
          echo"<br>";
        }

}

if(isset($_REQUEST["submit"]))
{
    if($_POST["password"]=="" )
    {
        echo "<b>Password Invalid</b>";
        echo"<br>";
  
    }
    else
    {
        echo $_POST["password"];
        echo"<br>";
    }

}


      
      session_start();
      if(isset($_REQUEST["submit"])){
        if(isset($_REQUEST["un"])||(isset($_REQUEST["password"])))
          {
    
            $patientdata = file_get_contents("../data/data.json");
            $patientlogindata = json_decode($patientdata);
    
            foreach($patientlogindata as $myjsonobject)
            {
                if($myjsonobject->Username==$_REQUEST["un"] && ($myjsonobject->Password == $_REQUEST["password"]))
                { 
                  echo "WELCOME...You have Successfully logged in <br>";
                 
                  $_SESSION["un"]=$_POST['un'];
                  $_SESSION["password"]=$_POST['password'];
                  header("location:../View/PatientProfile.php");
                  }
                 
                }
                echo "404 not found..Error in username or Password. Please try again.";
    
                
            }
            
          }*/

      
      session_start();
      //include("../Model/database.php");
      /*if(empty($_SESSION["un"]))
      {
        header("location:../View/PatientLogin.php");
        //$hasError=1;
      }
      else
      {
        echo $_SESSION["un"];
      }

      if(isset($_REQUEST["submit"]))
      {
        $mydb=new database();
        $connObj=$mydb->openCon();
        $results=$mydb->checkPatient($connObj,"patientregistrationdata",$_POST['un'],$_POST['password']);
        if($results==true)
        {
          $_SESSION["un"]=$_POST['un'];
          $_SESSION["password"]=$_POST['password'];
          header("location:../View/PatientProfile.php");

       
        }
        else
        {
          echo "404 not found..Error in username or Password. Please try again.".$connObj->error;
        }
        $mydb->closeCon($connObj);
      }*/
      if(isset($_REQUEST["submit"])){
        if(empty($_REQUEST["un"]) || empty($_REQUEST["password"])){
            echo "please provide username";
        }
        else{
            $username=$_POST["un"];
            $password=$_POST["password"];

            $mydb=new database();
            $connObj=$mydb->openCon();

            $results=$mydb->checkPatient($connObj,"patientregistrationdata",$_POST['un'],$_POST['password']);

            if($results->num_rows > 0) {
              $_SESSION["un"]=$_POST['un'];
              $_SESSION["password"]=$_POST['password'];
                header('Location: ../View/PatientProfile.php');
            }
            else {
                echo "404 not found..Error in username or Password. Please try again.".$connObj->error;
            }
            $mydb->CloseCon($connObj);
        }
    }
       

    $_COOKIE_name=$_POST["un"];
    $_COOKIE_value=$_POST["password"];
    if(!empty($_POST["cookies"])) {
      setcookie ($_COOKIE_name,$_COOKIE_value,time()+20);
      //setcookie ($_COOKIE_name,time()+);
      echo "Cookies Set Successfuly";
    } else {
      
      echo "Cookies Not Set";
    }
  
?>
<html>
  <body>
  <br><a href="../View/PatientRegistration.php"> <b>Return Registration form</b></a><br>
  <br><a href="../View/PatientLogin.php"> <b>Try Again to login</b></a><br>
  <img src="../image/Opps.jpg" alt="logo" width="300" height="400">
  </body>
      
     </html>