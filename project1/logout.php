<?php
// session_start();
// // unset($_SESSION['name']);
// session_destroy();
// header('location:login.php');
?>

<!-- ================================ -->


<?php
session_start();
session_destroy();
$_SESSION = array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" type="text/css" href="logout.css">
</head>

<body>
    <header>
        <h1>Ride Sharing Management - Admin Panel</h1>
    </header>

    <div class="container">
        <fieldset>
            <legend>LOGGED OUT</legend>
            <p>Thank you for using.</p>
            <form method="post" action="login.php">
                <input type="submit" value="Log In Again">
            </form>
        </fieldset>
    </div>
</body>

</html>


<?php include_once "footer.php"; ?>