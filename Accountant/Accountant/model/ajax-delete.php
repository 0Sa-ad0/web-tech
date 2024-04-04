<?php

$student_id = $_POST["id"];

$conn = mysqli_connect("localhost","root","","account") or die("Connection Failed");

$sql = "DELETE FROM services WHERE s_id = {$student_id}";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>
