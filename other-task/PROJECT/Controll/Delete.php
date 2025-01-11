<?php
include("../Model/database.php");

session_start();
    $mydb=new database();
    $conobj=$mydb->openCon();
    echo $_SESSION['un'];
    echo "<br>";
    $result=$mydb->deletepatient($conobj,"patientregistrationdata",$_SESSION['un']);

    if($result===TRUE)
    {
        $conobj->close();
        echo "Delete";
        header("location:../View/PatientLogin.php");
    }
    else{
        echo "Not delete";
    }

?>