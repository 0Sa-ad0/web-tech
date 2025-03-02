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
	<title>Schedule</title>
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
				<h3 style="text-align: center;"><strong>Add Schedule</strong></h3>
				<hr>
			</div>
			<div class="l-part">
				<form name="offer" onsubmit="return validateForm()" action="" method="POST" >
					<div class="input-group">
						<span class="input-group-addon"></span>
						<label class="form-control">Add A Date</label>
						<input type="date" class="form-control"  name="fname">

					</div>
					<div class="error" id="fnameErr"></div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"></span>
						<input type="text" class="form-control" placeholder="Schedule Name" name="Schedule">
					</div>
					<div class="error" id="lnameErr"></div><br>
					<br>
					<center><button id="signup" class="btn btn-info btn-lg" name="sign_up">ADD Schedule</button></center>
					<?php include("../controller/insert_schedule.php"); ?>
				</form><br><br>
			</div>
		</div>
	</div>
</div>

<script src="./js/offerval.js"></script>
</body>
<?php
		 include "../controller/footer.php";
		 ?>
</html>
