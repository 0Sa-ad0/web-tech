<?php include_once "header1.php"; ?>

<?php

if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
    header("Location: login.php");
    exit();
}
$riderData = array();
$updateSuccess = false;

$con = mysqli_connect('localhost', 'root', '', 'ridedb');
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

$driverId = isset($_GET['id']) ? (int) $_GET['id'] : null;

$selectedDriver = null;
if ($driverId !== null) {
    $sql = "SELECT * FROM driver WHERE driver_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $driverId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $selectedDriver = $result->fetch_assoc();
        }
    }
    $stmt->close();
}

$sqlAllDrivers = "SELECT * FROM driver";
$resultAllDrivers = mysqli_query($con, $sqlAllDrivers);
$driverData = mysqli_fetch_all($resultAllDrivers, MYSQLI_ASSOC);

/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updatedName = $_POST["name"];
    $updatedEmail = $_POST["email"];
    $updatedLicense = $_POST["license"];
    $driverId = $_POST["driver_id"];
    
    var_dump($_POST);


    if (empty($updatedName) || empty($updatedEmail) || empty($updatedLicense)) {
        echo "<p class='error'>Please fill in all fields.</p>";
    } else {
        if ($selectedDriver !== null) {
            $sql = "UPDATE driver SET name = ?, email = ?, license = ? WHERE driver_id = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sssi", $updatedName, $updatedEmail, $updatedLicense, $driverId);

            if ($stmt->execute()) {
                $updateSuccess = true;
            } else {
                echo "Error updating driver: " . $stmt->error;
            }
            echo "Executed SQL: " . $sql;

            $stmt->close();
        }
    }
} 
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updatedName = test_input($_POST["name"]);
    $updatedEmail = test_input($_POST["email"]);
    $updatedLicense = test_input($_POST["license"]);
    $driverId = test_input($_POST["driver_id"]);

    if (empty($updatedName) || empty($updatedEmail) || empty($updatedLicense)) {
        echo "<p class='error'>Please fill in all fields.</p>";
    } else {
        if ($selectedDriver !== null) {
            $sql = "UPDATE driver SET name = ?, email = ?, license = ? WHERE driver_id = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sssi", $updatedName, $updatedEmail, $updatedLicense, $driverId);

            if ($stmt->execute()) {
                $updateSuccess = true;
                echo "Driver updated successfully!";
            } else {
                echo "Error updating driver: " . $stmt->error;
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
    <title>Update Driver</title>
    <link rel="stylesheet" type="text/css" href="update_driver.css">
    <script src="update_driver-validation.js" defer></script>
</head>

<body>
    <div class="container">
        <h1>Update Driver</h1>
        <div id="demo"></div>

        <?php if (!$updateSuccess): ?>
            <table class="driver-table">
                <tr>
                    <th>Driver ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>License Number</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($driverData as $driver): ?>
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
                        <td><a href="?id=<?php echo $driver['driver_id']; ?>">Update</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

        <?php if ($selectedDriver !== null && !$updateSuccess): ?>
            <form method="post" autocomplete="off" novalidate onsubmit="return isValidUpdateDriverForm();">
                <fieldset>
                    <legend>Driver Information</legend>
                    <input type="hidden" id="driver_id" name="driver_id" value="<?php echo $selectedDriver['driver_id']; ?>"
                        readonly>

                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $selectedDriver['name']; ?>">

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $selectedDriver['email']; ?>">

                    <label for="license">License Number:</label>
                    <input type="text" id="license" name="license" value="<?php echo $selectedDriver['license']; ?>">
                </fieldset>

                <div id="error-container" class="error-container"></div>

                <input type="submit" value="Update Driver">
            </form>
        <?php endif; ?>

        <?php if ($updateSuccess): ?>
            <p class="success">Driver updated successfully!</p>
        <?php endif; ?>


        <a href="show_drivers.php">Show Drivers</a>

        <a href="dashboard.php">Back to Dashboard</a>
    </div>
</body>

</html>


<?php include_once "footer.php"; ?>