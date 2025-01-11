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
	<title>Policies</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="./css/signup.css">
</head>

<body>
<div class="row">

</div>
<div class="row">
	<div class="col-sm-12">
		<div class="main-content">
			<div class="header">
				<h3 style="text-align: center;"><strong>Add Policy</strong></h3>
				<hr>
			</div>
			<div class="l-part">
				<form name="offer" onsubmit="return validateForm()" action="" method="POST" >
					<div class="input-group">
						<span class="input-group-addon"></span>
						
						<input type="text" class="form-control" placeholder="Policy Name" name="fname">

					</div>
					<div class="error" id="fnameErr"></div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"></span>
						<input type="text" class="form-control" placeholder="Policy Details" name="p_name">
					</div>
					<div class="error" id="lnameErr"></div><br>
					<br>
					<center><button id="signup" class="btn btn-info btn-lg" name="sign_up">ADD Policy</button></center>
					<?php include("../controller/insert_policy.php"); ?>
				</form><br><br>
			</div>
		</div>
	</div>
</div>

</body>
<?php
		 include "../controller/footer.php";
		 ?>
</html>
