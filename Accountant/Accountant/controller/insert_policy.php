<?php
include("../model/connection.php");

	if(isset($_POST['sign_up'])){

		$first_name = htmlentities(mysqli_real_escape_string($con,$_POST['fname']));
		$last_name = htmlentities(mysqli_real_escape_string($con,$_POST['p_name']));
		
        $insert = "insert into policy (p_name,p_dtails)
		values('$first_name','$last_name')";

		$query = mysqli_query($con, $insert);

		if($query){
			echo "<script>alert('Policy Set')</script>";
			echo "<script>window.open('../view/Policies.php', '_self')</script>";
		}
		else{
			echo "<script>alert('Insertion failed, please try again!')</script>";
		  echo "<script>window.open('../view/Policies.php', '_self')</script>";
		}
	}
?>
