<?php

include("../model/connection.php");
include("../controller/header2.php");
if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>

	<title>Edit Your Personal Information</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<style>
.error{
	color: red;
}
</style>
<body>
<div class="row">
  <div class="col-sm-2">
  </div>
  <div class="col-sm-8">
  	<form name="updateForm" onsubmit="return validateForm()" action="" method="post" enctype="multipart/form-data">
      <table class="table table-bordered table-hover">
    		<tr align="center">
    			<td colspan="6" class="active"><h2>Edit Your Profile</h2></td>
    		</tr>
    		<tr>
    			<td style="font-weight: bold;">Change Your Firstname</td>
    			<td>
    				<input class="form-control" id="f_name" type="text" name="f_name" value="<?php echo $first_name; ?>">
  					<div class="error" id="fnameErr"></div>
    			</td>
    		</tr>
    			<tr>
    			<td style="font-weight: bold;">Change Your Lastname</td>
    			<td>
    				<input class="form-control" type="text" name="l_name" value="<?php echo $last_name; ?>">
  					<div class="error" id="lnameErr"></div>
    			</td>
    		</tr>
    			<tr>
    			<td style="font-weight: bold;">Change Your Username</td>
    			<td>
    				<input class="form-control" type="text" name="u_name" value="<?php echo $user_name; ?>">
  						<div class="error" id="unameErr"></div>
    			</td>
    		</tr>
    			
    		<tr>
    			<td style="font-weight: bold;">Change Password</td>
    			<td>
    				<input  class="form-control" type="password" name="u_pass" id="mypass" value="<?php echo $user_pass; ?>">
  						<div class="error" id="passwordErr"></div>
    			</td>
    		</tr>
    		<tr>
    			<td style="font-weight: bold;">Email</td>
    			 <td>
    				<input class="form-control" type="email" name="u_email"  value="<?php echo $user_email; ?>">
  						<div class="error" id="emailErr"></div>
    			</td>
    		</tr>
    		<tr>
    			<td style="font-weight: bold;">Country</td>
    			<td>
    				<select class="form-control" name="u_country">
    					<option><?php echo $user_country;?></option>
    					  <option>Bangladesh</option>
  							<option>United States of America</option>
  							<option>India</option>
  							<option>Japan</option>
  							<option>UK</option>
  							<option>France</option>
  							<option>Germany</option>

    				</select>
    			</td>
    		</tr>
    		<tr>
    			<td style="font-weight: bold;">Gender</td>
    			<td>
    				<select class="form-control" name="u_gender">
    					<option><?php echo $user_gender ?></option>

  							<option>Male</option>
  							<option>Female</option>
  							<option>Others</option>

    				</select>
    			</td>
    		</tr>
    		<tr>
    			<td style="font-weight: bold;">Birthday</td>
    			<td>
    				<input class="form-control input-md" type="date" name="u_birthday"  value="<?php echo $user_birthday; ?>">
  					<div class="error" id="bdErr"></div>
    			</td>
    		</tr>
    		<tr style="font-weight:bold;">
    			<td style="font-weight:">Forgotten Password</td>
    			<td>
    				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Turn On</button>
    				<div id="myModal" class="modal fade" role="dialog">
    					<div class="modal-dialog">
    						<div class="modal-content">
    							<div class="modal-header">
    								<button type="button" class="close" data-dismiss="modal">&times;</button>
    								<h4 class="modal-title">Modal Header</h4>
    							</div>
    							<div class="modal-body">
    								<form action="recovery.php?id=<?php echo $user_id;?>" method="post" id="f">
    									<strong>What is your best friend name?</strong>
    									<textarea class="form-control" cols="83" rows="4" name="content" placeholder="Someone"></textarea><br>
    									<input class="btn btn-default" type="submit" name="sub" value="Submit" style="width:100px;"><br><br>
    									<pre>Answer the above question we will ask this question if you forgot your <br>password.</pre><br><br>
    								</form>
								 <?php

                      if (isset($_POST['sub'])) {
												$bfn = htmlentities($_POST['content']);
												if ($bfn == '') {
													echo "<script>alert('Please enter something')</script>";
													echo "<script>window.open('edit.php?u_id$user_id','_self')</script>";

													exit();
													// code...
												}else {
													$update = "update user set recovery_account='$bfn' where user_id='$user_id'";

													$run= mysqli_query($con,$update);
													if ($run) {
														echo "<script>alert('Working......')</script>";
														echo "<script>window.open('edit.php?u_id$user_id','_self')</script>";
														// code...
													}else {
														echo "<script>alert('Error while updating information')</script>";
														echo "<script>window.open('edit.php?u_id$user_id','_self')</script>";
													}
												}
                      	// code...
                      }

								  ?>
  							</div>
  							<div class="modal-footer">
  								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  							</div>
  						</div>
  					</div>
  				</div>
  			</td>
  		</tr>
  		<tr align="center">
  			<td colspan="6">
  				<input type="submit" class="btn btn-info" name="update" style="width:250px;" value="Update">
  			</td>
  		</tr>
  	</table>
  </form>
  </div>
  <script src="./js/validate2.js"></script>
  <div class="col-sm-2">
  </div>
</div>
<?php
		 include "../controller/footer.php";
		 ?>
</body>
</html>
<?php

if (isset($_POST['update'])) {
	$f_name = htmlentities($_POST['f_name']);
	$l_name = htmlentities($_POST['l_name']);
	$u_name = htmlentities($_POST['u_name']);
	$u_pass = htmlentities($_POST['u_pass']);
	$u_email = htmlentities($_POST['u_email']);
	$u_country = htmlentities($_POST['u_country']);
	$u_gender = htmlentities($_POST['u_gender']);
	$u_birthday= htmlentities($_POST['u_birthday']);
  if ($f_name == '') {
     echo "<script>alert('Please enter valid firstname')</script>";
     echo "<script>window.open('edit.php?u_id$user_id','_self')</script>";

     exit();
     // code...
   }
    elseif ($l_name=='') {
         echo "<script>alert('Please enter valid lastname')</script>";
         echo "<script>window.open('edit.php?u_id$user_id','_self')</script>";

         exit();
    }
    elseif ($u_name=='') {
         echo "<script>alert('Please enter valid username')</script>";
         echo "<script>window.open('edit.php?u_id$user_id','_self')</script>";

         exit();     // code...
    }
    elseif ($u_pass=='') {
         echo "<script>alert('Please enter valid password')</script>";
         echo "<script>window.open('edit.php?u_id$user_id','_self')</script>";

         exit();
    }
    elseif ($u_email=='') {
         echo "<script>alert('Please enter valid email')</script>";
         echo "<script>window.open('edit.php?u_id$user_id','_self')</script>";

         exit();     // code...
    }
   else {
     $update = "update user set f_name='$f_name',l_name='$l_name',user_name='$u_name', user_pass='$u_pass',user_email='$u_email',user_country='$u_country',user_gender='$u_gender',user_birthday='$u_birthday' where user_id='$user_id'";
     $run= mysqli_query($con,$update);
      if ($run) {
        echo "<script>alert('Updating......')</script>";
        echo "<script>window.open('edit.php?u_id$user_id','_self')</script>";
        // code...
      }
   }

}
	// code...


 ?>
