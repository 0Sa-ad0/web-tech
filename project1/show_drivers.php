<?php include_once "header1.php"; ?>

<?php

if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
    header("Location: login.php");
    exit();
}


$con = mysqli_connect('localhost', 'root', '', 'ridedb');
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}


$drivers = [];
$sql = "SELECT driver_id, name, email, license FROM driver";

$stmt = $con->prepare($sql);


if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $drivers[] = [
                "driver_id" => $row["driver_id"],
                "name" => $row["name"],
                "email" => $row["email"],
                "license" => $row["license"]
            ];
        }
    }
    $stmt->close();
} else {
    die("Database error: " . $con->error);
}

$con->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Drivers</title>
    <link rel="stylesheet" type="text/css" href="show_drivers.css">
     <script type="text/javascript" src="search_drivers.js"></script> 
</head>

<body>
    <div class="container">
        <!-- <h1>Show Drivers</h1> -->

        <div id="fullInfo"></div>

        <div class="header">
            <h1>Show Drivers</h1>
            <div class="search-container">
                <button onclick="search()" style="float:right">Search</button>
                <input type="text" id="searchInput" placeholder="Search..." style="float:right">
            </div>
        </div>

        <table class="driver-table">
            <tr>
                <th>Driver ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>License Number</th>
            </tr>
            <?php foreach ($drivers as $driver): ?>
                <tr>
                    <td>
                        <?php echo $driver['driver_id']; ?>
                    </td>
                    <td>
                        <?php echo $driver['name']; ?>
                    </td>
                    <td>
                        <?php echo $driver['email']; ?>
                    </td>
                    <td>
                        <?php echo $driver['license']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div id="noDataFound" style="display:none; text-align: center; margin-top: 10px;">
            No Data Found
        </div>

        <br>
        <a href="dashboard.php">Back to Admin Dashboard</a>



    </div>

</body>

</html>

<?php include_once "footer.php"; ?>