<?php include_once "header1.php"; ?>

<?php
if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
</head>

<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>

    <main>
        <section id="drivers">
            <h2>Drivers</h2>
            <nav>
                <a href="add_driver.php">Add Driver</a>
                <a href="show_drivers.php">Show Drivers</a>
                <a href="update_driver.php">Update Driver</a>
            </nav>
        </section>

        <section id="admins">
            <h2>Admins</h2>
            <nav>
                <a href="add_admin.php">Add Admin</a>
                <a href="show_admin.php">Show Admin</a>
            </nav>
        </section>

        <section id="earnings">
            <h2>Earnings</h2>
            <nav>
                <a href="add_earning.php">Add Earning</a>
                <a href="show_earnings.php">Show Earnings</a>
            </nav>
        </section>

        <section id="locations">
            <h2>Locations</h2>
            <nav>
                <a href="add_location.php">Add Location</a>
                <a href="show_locations.php">Show Locations</a>
                <a href="update_location.php">Update Location</a>
            </nav>
        </section>

        <section id="riders">
            <h2>Riders</h2>
            <nav>
                <a href="add_rider.php">Add Rider</a>
                <a href="show_riders.php">Show Riders</a>
                <a href="update_rider.php">Update Rider</a>
            </nav>
        </section>

        <section id="bookings">
            <h2>User Route Booking</h2>
            <nav>
                <a href="user_booking.php">User Route Booking</a>
            </nav>
        </section>
    </main>
</body>

</html>



<?php include_once "footer.php"; ?>
