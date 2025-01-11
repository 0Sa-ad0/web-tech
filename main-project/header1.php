<?php
session_start();

$first_name = isset($_SESSION['firstName']) ? $_SESSION['firstName'] : '';
$last_name = isset($_SESSION['lastName']) ? $_SESSION['lastName'] : '';
$email = isset($_SESSION["Email"]) ? $_SESSION["Email"] : "";
// $phone = isset($_SESSION["Phone/Mobile"]) ? $_SESSION["Phone/Mobile"] : "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header1.css">
</head>

<body>
        <header>
            <h1>Ride Sharing Management</h1>
            <div>
                <?php if (!empty($first_name) && !empty($last_name)): ?>
                    <p><strong>Welcome,,,</strong>
                        <strong>
                            <?php echo $last_name; ?>
                        </strong>,
                        <strong>
                            <?php echo $first_name; ?>
                        </strong>
                    </p>
                <?php endif; ?>
            </div>
            <div class="topnav">
                <a href="profile.php">Profile</a>
                <a href="dashboard.php">DASHBOARD</a>
                <a href="show_drivers.php">Drivers</a>
                <a href="show_admin.php">Admins</a>
                <a href="show_earnings.php">Earnings</a>
                <a href="show_locations.php">Locations</a>
                <a href="show_riders.php">Riders</a>
                <a href="user_booking.php">Book a Ride</a>
                <a href="logout.php" style="float:right">Log Out</a>
            </div>


        </header>
</body>

</html>