<?php
include("../Model/database.php");
session_start();
$mydb=new database();
$conobj=$mydb->openCon();
$dataRet=$mydb->showDetails($conobj,"patientregistrationdata",$_SESSION["un"]);
if($dataRet->num_rows==1)
{
    foreach($dataRet as $obj=>$o)
    {
        $fname=$o['FirstName'];
        $lname=$o['LastName'];
        $Fname=$o['FatherName'];
        $Mname=$o['MotherName'];
        $un=$o['Username'];
        $password=$o['Password'];
        $Gender=$o['Gender'];
        $date=$o['DateofBirth'];
        $age=$o['Age'];
        $no=$o['MobileNumber'];
        $address=$o['Address'];
        $postcode=$o['Postcode'];
        $ename=$o['EmergencyContactName'];
        $eno=$o['EmergencyContactNumber'];
        $RP=$o['RelationshipToPatient'];
        $WRTP=$o['Reffered'];
        $fileUpload=$o['Prescription'] ;
        $email=$o['EMail'];
        //echo $fname;
        
    }
}

if(isset($_REQUEST["update"]))
{/*
    if(!empty($_FILES["fileUpload"]["tmp_name"]))
    {
        $fileUpload="../Upload/".$_FILES["fileUpload"]["tmp_name"];
        move_uploaded_file($_FILES["fileUpload"]["name"]);
    }
*/
    //$mydb=new database();
    //$conobj=$mydb->openCon();
    $result=$mydb->UpdatePatient($conobj,"patientregistrationdata",$_REQUEST["fname"],$_REQUEST["lname"],$_REQUEST["Fname"],$_REQUEST["Mname"],$_SESSION["un"],$_REQUEST["password"],$_REQUEST["Gender"],$_REQUEST["date"],$_REQUEST["age"],$_REQUEST["no"],$_REQUEST["address"],$_REQUEST["postcode"],$_REQUEST["ename"],$_REQUEST["RP"],$_REQUEST["eno"],$_REQUEST["WRTP"],$_REQUEST["email"]);
    if($result==true)
    {
        echo "Your Data is updated";
    }

    else 
    {
        echo "Your Data is not updated";
    }
}
?>