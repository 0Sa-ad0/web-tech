<?php
include("../Model/database.php");
$hasError=0;
if(isset($_REQUEST["submit"]))//assest define that my value is set or not
{
    if(empty($_REQUEST["fname"]) || empty($_REQUEST["lname"]) || $_REQUEST["fname"]=="_" || $_REQUEST["fname"]=="@"  )// (empty($_REQUEST["Fname"]))//empty dfine zero
    {
        echo "<b>First name and Last Name is required</b>";
        echo"<br>";
        $hasError=1;
    }

    elseif($_REQUEST["un"]=="-" || $_REQUEST["un"]=="+" || $_REQUEST["un"]=="/" || $_REQUEST["un"]=="*")
    {
        echo "<b>Do not use oprators only</b>";
        echo"<br>";
    }
    else
    {
        echo $_REQUEST["fname"];
        echo $_REQUEST["lname"];
        echo"<br>";
    }
    
}

if(isset($_REQUEST["submit"]))//assest define that my value is null or not
{
    if(empty($_REQUEST["Fname"]))// (empty($_REQUEST["Fname"]))//empty dfine zero
    {
        echo "<b>Father name is required</b>";
        echo"<br>";
        $hasError=1;
    }
    elseif($_REQUEST["un"]=="-" || $_REQUEST["un"]=="+" || $_REQUEST["un"]=="/" || $_REQUEST["un"]=="*")
    {
        echo "<b>Do not use oprators only</b>";
        echo"<br>";
        $hasError=1;
    }

    else 
    {
        echo $_REQUEST["Fname"];
        echo"<br>";
    }
      
}

if(isset($_REQUEST["Mname"]))//assest define that my value is null or not
{
    if(empty($_REQUEST["Mname"]))// (empty($_REQUEST["Fname"]))//empty dfine zero
    {
        echo "<b>Mother name is required</b>";
        echo"<br>";
        $hasError=1;
    
    }

    elseif($_REQUEST["un"]=="-" || $_REQUEST["un"]=="+" || $_REQUEST["un"]=="/" || $_REQUEST["un"]=="*")
    {
        echo "<b>Do not use oprators only</b>";
        echo"<br>";
        $hasError=1;

    }

    else 
    {
        echo $_REQUEST["Mname"];
        echo"<br>";
    }
    
    
}

if(isset($_REQUEST["submit"]))
{
    if($_REQUEST["password"]!=="" && strlen($_REQUEST["password"])<8)
    {
        echo "<b>Password invalid</b>";
        echo"<br>";
        $hasError=1;
    }
    else
    {
        echo $_POST["password"];
        echo"<br>";
    }

}

if(isset($_REQUEST["Gender"]))
{
    echo "<b>radio is checked</b>";
    echo"<br>";
    if($_REQUEST["Gender"]=="male")//value = male
    {
        echo "you have choosen".$_REQUEST["Gender"];
    }
    else{
        echo "you have choosen".$_REQUEST["Gender"];
    }
}
else{
    //echo "<b>radio is not checked</b>";
    $hasError==1;
    echo"<br>";
}

if(isset($_REQUEST["submit"]))
{
    if(empty($_REQUEST["date"]))
    {
        echo "<b>Date of Birth is required</b>";
        echo"<br>";
        $hasError=1;
    }

    else 
    {
        echo $_REQUEST["date"];
        echo"<br>";
    }
    
    
}

if(isset($_REQUEST["submit"]))
{
    if(empty($_REQUEST["age"]) || strlen($_REQUEST["age"])>3)
    {
        echo "<b>Age is required</b>";
        echo"<br>";
        $hasError==1;
    }

    else 
    {
        echo $_REQUEST["age"];
        echo"<br>";
    }
    
    
}

if(isset($_REQUEST["submit"]))
{
    if(empty($_REQUEST["no"]) || strlen($_REQUEST["no"])>11)
    {
        echo "<b>Mobile no is required or maybe it is invalid</b>";
        echo"<br>";
        $hasError=1;
    }

    else 
    {
        echo $_REQUEST["no"];
        echo"<br>";
    }
    
}

if(isset($_REQUEST["submit"]))
{
    if(empty($_REQUEST["address"]))
    {
        echo "<b>Street number is not mentioned</b>";
        echo"<br>";
        $hasError==1;
    }

    else 
    {
        echo $_REQUEST["address"];
        echo"<br>";
    } 
}

if(isset($_REQUEST["submit"]))
{
    if(empty($_REQUEST["postcode"]) || $_REQUEST["postcode"]>4)
    {
        echo "<b>Postcode is required</b>";
        echo"<br>";
    }

    else 
    {
        echo $_REQUEST["postcode"];
        echo"<br>";
    }
    
}

if(isset($_REQUEST["submit"]))
{
    if(empty($_REQUEST["Ename"]))
    {
        echo "<b>Emergency contact name is required</b>";
        echo"<br>";
        $hasError==1;
    }

    else 
    {
        echo $_REQUEST["Ename"];
        echo"<br>";
    }
    
}

if(isset($_REQUEST["submit"]))
{
    if(empty($_REQUEST["RP"]))
    {
        echo "<b>Relationship with patient is required</b>";
        echo"<br>";
        $hasError==1;
    }

    else 
    {
        echo $_REQUEST["RP"];
        echo"<br>";
    }
    
}



if(isset($_REQUEST["submit"]))
{
    if(empty($_REQUEST["eno"]) || strlen($_REQUEST["eno"])>11)
    {
        echo "<b>Emergency cotact number is required or May be it is invalid</b>";
        echo"<br>";
        $hasError==1;
    }

    else 
    {
        echo $_REQUEST["eno"];
        echo"<br>";
    }
    
}



if(isset($_REQUEST["Doctor"]))
{
    echo "<b>checkbox is checked</b>";
    echo"<br>";
    
    if($_REQUEST["Doctor"]=="Doctor")//value = male
    {
        echo "<b>you have choosen </b>".$_REQUEST["Doctor"];
        echo"<br>";
    }
   
   if(isset($_REQUEST["Family"]))
   {
    if($_REQUEST["Family"]=="Family"){
        echo "<b>you have choosen</b>".$_REQUEST["Family"];
        echo"<br>";
    }
   }
   
   if(isset($_REQUEST["Internet"]))
   {
    if($_REQUEST["Internet"]=="Internet"){
        echo "<b>you have choosen</b>".$_REQUEST["Internet"];
        echo"<br>";
    }
   }
 
   if(isset($_REQUEST["Other"]))
   {
    if($_REQUEST["Other"]=="Other"){
        echo "<b>you have choosen</b>".$_REQUEST["Other"];
        echo"<br>";
    }
   }
   
}
else{
    //echo "<b>checkbox is not checked</b>";
    echo"<br>";
    $hasError==1;
}

if(isset($_REQUEST["submit"]))
{
    if(empty($_REQUEST["WRTP"]))
    {
        echo "<b>Didn't mention the name of the person who referred the patient</b>";
        echo"<br>";
        $hasError==1;
    }

    else 
    {
        echo $_REQUEST["WRTP"];
        echo"<br>";
    }
    
    
}

if(isset($_REQUEST["submit"]))
{
    if(empty($_REQUEST["email"]))
    {
        echo "<b>Didn't mention the email of the person who referred the patient</b>";
        echo"<br>";
        $hasError==1;
    }

    else 
    {
        echo $_REQUEST["email"];
        echo"<br>";
    }
    
    
}
if(isset($_REQUEST["submit"])){
 //specifies the directory where the file is going to be placed
$target_file ="../Upload/".$_FILES["fileUpload"]["name"]; //specifies the path of the file to be uploaded

if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
    echo "The file ".$_FILES["fileUpload"].$_POST["un"]." has been uploaded.";
    $fileupload = $_FILES["fileUpload"]["type"];
}
else {
    echo "prescription is not uploaded......";
    $hasError=1;
}
}

if(isset($_REQUEST["submit"])){
 
if(file_exists("../data/data.json")){
  $data=json_decode(file_get_contents("../data/data.json"));//json to array
 foreach($data as $patientdata)
 {
   if($patientdata->Username==$_REQUEST["un"] || $_REQUEST["un"]=="-" || $_REQUEST["un"]=="+" || $_REQUEST["un"]=="/" || $_REQUEST["un"]=="*"  )
   {
    echo $_REQUEST["un"]." Already taken or Do not use operators only";
    return;
   }
   
 }
    
if($hasError==0)
{
//get form data
$formdata = array(
                'First name:' => $_REQUEST["fname"],
                'Last Name:' => $_REQUEST["lname"],
                'Father Name:' => $_REQUEST["Fname"],
                'Mother Name:'=> $_REQUEST["Mname"],
	              'Username' => $_POST["un"],
	    
	             'Password'=> $_POST["password"],
               'Gender:'=>$_REQUEST["Gender"],
               'Date of Birth:'=>$_REQUEST["date"],
               'Age:'=>$_REQUEST["age"],
               'Mobile:'=>$_REQUEST["no"],
               'Address:'=>$_REQUEST["address"],
               'Postcode:'=>$_REQUEST["postcode"],
               'Emergency contact name:'=>$_REQUEST["Ename"],
               'Relation with patient:'=>$_REQUEST["RP"],
               'Emergency mobile:'=>$_REQUEST["eno"],
               'Email:' =>$_REQUEST["email"]);


 $prevdata = file_get_contents("../data/data.json");//data of existing json file
 $newdata= json_decode($prevdata); //json to array
 $newdata[]= $formdata; //merge data

       $jsondata= json_encode($newdata, JSON_PRETTY_PRINT); //convert updated array to json 

       if(file_put_contents("../data/data.json",$jsondata)) //write json data into json file
       {
        echo ",br><b><i><u>Data saved successfully..</b></i></u><br>";
        //header("location:../View/PatientLogin.php");
       }
       else 
       echo "<br>Data is not saved.<br>"; 
    
  }
}

if($hasError==0)
{
    $mydb=new database(); //obj of database class
    $connObj=$mydb->openCon();  //call connection obj
    $mydb->insertPatientRegistrationData($connObj,"patientregistrationdata",$_REQUEST["fname"],$_REQUEST["lname"],$_REQUEST["Fname"],$_REQUEST["Mname"],$_POST["un"],$_POST["password"],$_REQUEST["Gender"],$_REQUEST["date"],
    $_REQUEST["age"],$_REQUEST["no"],$_REQUEST["address"],$_REQUEST["postcode"],$_REQUEST["Ename"],$_REQUEST["RP"],$_REQUEST["eno"],$_REQUEST["WRTP"], $target_file,$_REQUEST["email"]);
    $mydb->closeCon($connObj);
}


}




?>
     