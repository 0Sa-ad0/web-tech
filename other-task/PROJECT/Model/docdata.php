<?php
class docdata{
 
function OpenCon()
 {
 $docdatahost = "localhost";
 $docdatauser = "root";
 $docdatapass = "";
 $docdata = "patient";
 $conn = new mysqli($docdatahost, $docdatauser, $docdatapass,$docdata);
 
 return $conn;
 }

 function doctorshow($conn,$table)
 {
        $result = $conn->query("SELECT * FROM  $table");
        return $result;
 }

 function getDocInfo($conn,$name)
 {
       $query="select * from doctor where DoctorName like '$name%'";
      
       return $conn->query($query);
 }
}