<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Profile</title>
</head>

 

<body>
<h1>Profile</h1>
<table>
<tr>
<td>
<fieldset>
<legend>General Information:</legend>
<table>
<tr>
<td>
<p><b>First Name </b></p>
<p><b>Last Name </b></p>
<p><b>Father's Name </b></p>
<p><b>Mother's Name </b></p>
<p><b>Date of Birth </b></p>
<p><b>Gender </b></p>
<p><b>Blood Group </b></p>
<p><b>Religion </b></p>
</td>

 

                        <td>
<p>:<?php echo $_POST["firstname"]; ?> </p>
<p>:<?php echo $_POST["lastname"]; ?> </p>
<p>:<?php echo $_POST["father'sname"]; ?> </p>
<p>:<?php echo $_POST["mother'sname"]; ?> </p>
<p>:<?php echo $_POST["dob"]; ?> </p>
<p>:<?php echo $_POST["gender"]; ?> </p>
<p>:<?php echo $_POST["bloodgroup"]; ?> </p>
<p>:<?php echo $_POST["Religion"]; ?> </p>
</td>

 

                        <td>
<img src="img.jpg" alt="Image.jpg" style="width: 128px; height: 128px;">
</td>
</tr>
</table>
</fieldset>
</td>
<td>
<fieldset>
<legend>Contact Information :</legend>
<table>
<tr>
<td>
<p><b>Email:</b> </p>
<p><b>Phone/Mobile:</b> </p>
<p><b>Website:</b></p>
<p><b>Present Address:</b></p>
</td>
<td>
<p>:<?php echo $_POST["Email"]; ?> </p>
<p>:<?php echo $_POST["Phone/Mobile"]; ?> </p>
<p>:<?php echo $_POST["Website"]; ?> </p>
<p>:<?php echo $_POST["rsc"] . ", " . $_POST["Division"] . ", " . $_POST["postcode"] . ", " . $_POST["country"]; ?> </p>
</td>
</tr>
</table>
</fieldset>
</td>
</tr>
</table>
<a href="regestration.html"> Go Back </a>
</body>
</html>