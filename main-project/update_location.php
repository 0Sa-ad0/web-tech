<?php include_once "header1.php"; ?>

<?php

if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
    header("Location: login.php");
    exit();
}

$locationData = array();
$updateSuccess = false;

$con = mysqli_connect('localhost', 'root', '', 'ridedb');
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

$locationId = isset($_GET['location_id']) ? (int) $_GET['location_id'] : null;

$selectedLocation = null;
if ($locationId !== null) {
    $sql = "SELECT * FROM location WHERE location_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $locationId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $selectedLocation = $result->fetch_assoc();
        }
    }

    $stmt->close();
}

$sql = "SELECT * FROM location";
$result = mysqli_query($con, $sql);
$locationData = mysqli_fetch_all($result, MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $locationId = test_input($_POST['location_id']);
    $startingPoint = test_input($_POST['starting_point']);
    $destination = test_input($_POST['destination']);

    if (empty($locationId) || empty($startingPoint) || empty($destination)) {
        echo "<p class='error'>Please fill in all fields.</p>";
    } else {
        if ($selectedLocation != null) {
            $sql = "UPDATE location SET location_id = ?, starting_point = ?, destination = ? WHERE location_id = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("isss", $locationId, $startingPoint, $destination, $locationId);

            if ($stmt->execute()) {
                $updateSuccess = true;
            } else {
                echo "Error updating location: " . $stmt->error;
            }

            $stmt->close();
        }
    }
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
    <title>Update Location</title>
    <link rel="stylesheet" type="text/css" href="update_location.css">
    <script src="update_location-validation.js" defer></script>
</head>

<body>
    <div class="container">
        <h1>Update Locations</h1>

        <?php if (!$updateSuccess): ?>
            <table class="location-table">
                <tr>
                    <th>Location ID</th>
                    <th>Starting Point</th>
                    <th>Destination</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($locationData as $location): ?>
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
                        <td><a href="?location_id=<?php echo $location['location_id']; ?>">Update</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

        <?php if ($selectedLocation !== null && !$updateSuccess): ?>
            <form method="post" autocomplete="off" novalidate onsubmit="return isValidUpdateLocationForm();">
                <fieldset>
                    <legend>Location Information</legend>
                    <table>
                        <div id="error-container" class="error-container"></div>
                        
                        <input type="hidden" id="location_id" name="location_id"
                            value="<?php echo $selectedLocation['location_id']; ?>">
                        <!-- <tr>
                            <td><label for="location_id">Location ID:</label></td>
                            <td><input type="hidden" id="location_id" name="location_id"
                                    value="<?php echo $selectedLocation['location_id']; ?>"></td>
                        </tr> -->

                        <tr>
                            <td><label for="starting_point">Starting Point:</label></td>
                            <td><input type="text" id="starting_point" name="starting_point"
                                    value="<?php echo $selectedLocation['starting_point']; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="destination">Destination:</label></td>
                            <td><input type="text" id="destination" name="destination"
                                    value="<?php echo $selectedLocation['destination']; ?>"></td>
                        </tr>
                    </table>
                    <div id="location_id-error"></div>
                    <div id="starting_point-error"></div>
                    <div id="destination-error"></div>
                    <!-- <div id="error-container"></div> -->
                </fieldset>

                <input type="submit" value="Update Location">
            </form>
        <?php endif; ?>

        <?php
        if ($updateSuccess) {
            echo "<p class='success'>Location updated successfully!</p>";
        }
        ?>

        <a href="show_locations.php">Show Locations</a>

        <a href="dashboard.php">Back to dashboard</a>
    </div>
</body>

</html>

<?php include_once "footer.php"; ?>