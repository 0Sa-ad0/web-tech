<?php

$student_id = $_POST["id"];
$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];

$conn = mysqli_connect("localhost","root","","account") or die("Connection Failed");

$sql = "UPDATE services SET s_info = '{$firstName}', s_detail = '{$lastName}' WHERE s_id = {$student_id}";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>
