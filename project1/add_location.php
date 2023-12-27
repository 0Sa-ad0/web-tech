<?php include_once "header1.php"; ?>

<?php

$startingPointError = "";
$destinationError = "";

if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $startingPointError = $destinationError = "";
    $locationData = $_POST;
    $startingPoint = test_input($locationData['starting_point']);
    $destination = test_input($locationData['destination']);

    if (empty($startingPoint)) {
        $startingPointError = "Starting Point is required";
    }

    if (empty($destination)) {
        $destinationError = "Destination is required";
    }

    if (empty($startingPointError) && empty($destinationError)) {
        $con = mysqli_connect('localhost', 'root', '', 'ridedb');
        if (!$con) {
            die("Database connection failed: " . mysqli_connect_error());
        }
        $insertSuccess = insertLocation($con, $locationData);

        if ($insertSuccess) {
            $successMessage = "Location added successfully!";
            $mapsLink = generateGoogleMapsLink($startingPoint, $destination);
        } else {
            $errorMessage = "Something went wrong while adding the location.";
        }
        mysqli_close($con);
    }
}

function insertLocation($con, $locationData)
{
    $startingPoint = mysqli_real_escape_string($con, $locationData['starting_point']);
    $destination = mysqli_real_escape_string($con, $locationData['destination']);

    $sql = "INSERT INTO location (starting_point, destination) VALUES (?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $startingPoint, $destination);

    try {
        $stmt->execute();
        $stmt->close();
        return true;
    } catch (Exception $e) {
        return false;
    }
}


function generateGoogleMapsLink($startingPoint, $destination)
{
    $encodedStartingPoint = urlencode($startingPoint);
    $encodedDestination = urlencode($destination);
    $mapsLink = "https://www.google.com/maps?q=$encodedStartingPoint+to+$encodedDestination";

    return "<a href=\"$mapsLink\" target=\"_blank\">View Route on Google Maps</a>";
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Location</title>
    <link rel="stylesheet" type="text/css" href="add_location.css">
    <script src="add_location-validation.js" defer></script>
</head>

<body>
    <div class="container">
        <h1>Add Location</h1>

        <form method="post" action="" autocomplete="off" novalidate onsubmit="return isValidLocationForm();">
            <fieldset>
                <legend>Location Information</legend>
                <table>
                    <tr>
                        <td><label for="starting_point">Starting Point:</label></td>
                        <td><input type="text" id="starting_point" name="starting_point"></td>
                        <td><span class="error" id="startingPointError">
                                <?php echo $startingPointError; ?>
                            </span></td>
                    </tr>
                    <tr>
                        <td><label for="destination">Destination:</label></td>
                        <td><input type="text" id="destination" name="destination"></td>
                        <td><span class="error" id="destinationError">
                                <?php echo $destinationError; ?>
                            </span></td>
                    </tr>
                </table>
                <?php
                if (isset($successMessage)) {
                    echo "<p class='success'>$successMessage</p>";
                    if (isset($mapsLink)) {
                        echo "<p>$mapsLink</p>";
                    }
                }
                if (isset($errorMessage)) {
                    echo "<p class='error'>$errorMessage</p>";
                }
                ?>
            </fieldset>

            <button type="submit">Create Location</button>
            <br>

            <a href="show_locations.php" target="_blank">Show Locations</a>

            <a href="dashboard.php">Back to Admin dashboard</a>
        </form>
    </div>
</body>

</html>



<?php include_once "footer.php"; ?>