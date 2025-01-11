<?php include_once "header1.php"; ?>

<?php

if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
    header("Location: login.php");
    exit();
}
$locations = array();

$con = mysqli_connect('localhost', 'root', '', 'ridedb');
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM location";
$stmt = $con->prepare($sql);

if ($stmt) {
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $locations[] = $row;
        }
        mysqli_free_result($result);
    }
    $stmt->close();
} else {
    die("Prepared statement error: " . $con->error);
}

mysqli_close($con);

function generateGoogleMapsLink($startingPoint, $destination)
{
    $encodedStartingPoint = urlencode($startingPoint);
    $encodedDestination = urlencode($destination);
    $mapsLink = "https://www.google.com/maps?q=$encodedStartingPoint+to+$encodedDestination";

    return "<a href=\"$mapsLink\" target=\"_blank\">View Route</a>";
}
function displayLocations($locations)
{
    if (empty($locations)) {
        echo "<p>No locations added yet.</p>";
    } else {
        echo "<h2>List of Locations:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Location ID</th><th>Starting Point</th><th>Destination</th></tr>";
        foreach ($locations as $location) {
            echo "<tr><td>{$location['location_id']}</td><td>{$location['starting_point']}</td><td>{$location['destination']}</td></tr>";
            $route = isset($location['route']) ? $location['route'] : '';
            echo "<td>$route</td>";
            $mapsLink = generateGoogleMapsLink($location['starting_point'], $location['destination']);
            echo "<td>$mapsLink</td>";

            echo "</tr>";
        }
        echo "</table>";
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Locations</title>
    <link rel="stylesheet" type="text/css" href="show_locations.css">
</head>

<body>
    <div class="container">
        <h1>Show Locations</h1>

        <table class="location-table">
            <tr>
                <th>Location ID</th>
                <th>Starting Point</th>
                <th>Destination</th>
                <th>View Route on Google Maps</th>
            </tr>
            <?php foreach ($locations as $location): ?>
                <tr>
                    <td>
                        <?php echo $location['location_id']; ?>
                    </td>
                    <td>
                        <?php echo $location['starting_point']; ?>
                    </td>
                    <td>
                        <?php echo $location['destination']; ?>
                    </td>

                    <td>
                        <?php
                        $mapsLink = generateGoogleMapsLink($location['starting_point'], $location['destination']);
                        echo $mapsLink;
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <p><a href="dashboard.php">Back to Admin Dashboard</a></p>
    </div>
</body>

</html>



<?php include_once "footer.php"; ?>