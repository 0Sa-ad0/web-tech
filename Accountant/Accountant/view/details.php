 <?php
      require '../controller/Header.php';
 ?>
<?php
echo "<center>"; 
echo "<h2>"; 
include '../Controller/Productcontroller.php' ;

$name = $_GET['name'];

$student = studentInfo($name);
    
	echo $student['name'];
	echo "<br>";
	echo "Price :";
	
	echo $student['ProductPrice'];
	echo "<br>";
	echo "</h2>";
echo "</center>";
?>