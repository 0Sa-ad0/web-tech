<?php
$hasError=0;

if(isset($_REQUEST["submit"]))
{
    if(empty($_REQUEST["pname"]) )
    {
        echo "<b>Patient name  is required</b>";
        echo"<br>";
        $hasError=1;
    }

    else 
    {
      echo $_REQUEST["pname"];
      echo"<br>";
    }
    
}



if(isset($_REQUEST["submit"]))
    if(empty($_REQUEST["pdoctor"]) )
    {
        echo "<b>Doctor name required</b>";
        echo"<br>";
        $hasError=1;
    }

    else 
    {
      echo $_REQUEST["pdoctor"];
      echo"<br>";
    }

    if(isset($_REQUEST["specialist"]))
    {
        //echo "<b>radio is checked</b>";
        echo"<br>";
        if($_REQUEST["specialist"]=="Dermatologists")//value = male
        {
            echo "you have choosen".$_REQUEST["specialist"];
        }
        else if($_REQUEST["specialist"]=="Cardiologists")//value = male
        {
            echo "you have choosen".$_REQUEST["specialist"];
        }

        else{
            echo "you have choosen".$_REQUEST["specialist"];
        }
    }
    else{
        echo "<b>radio is not checked</b>";
        echo"<br>";
    }


if(isset($_REQUEST["submit"])){
 
    if(file_exists("../data/Appointment.json")){
      $data=json_decode(file_get_contents("../data/Appointment.json"));

    $formdata = array(
                    'Patient name:'    => $_REQUEST["pname"],
                    'Specialist'       => $_REQUEST["specialist"],
                    'Prefereble doctor'=> $_POST["pdoctor"] );
    
    
     $prevdata = file_get_contents("../data/Appointment.json");
     $newdata= json_decode($prevdata);
     $newdata[]= $formdata;
    
           $jsondata= json_encode($newdata, JSON_PRETTY_PRINT);
    
           if(file_put_contents("../data/Appointment.json",$jsondata))
           {
            echo "<b><i><u>Appointment Request Have been successfull..</b></i></u><br>";
            //header("location:../View/PatientLogin.php");
           }
           else 
           echo "Request Failed"; 
        
      }
    }
    
    

?>

