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

$riderId = isset($_GET['id']) ? (int) $_GET['id'] : null;

$selectedRider = null;
if ($riderId !== null) {
    $sql = "SELECT * FROM rider WHERE rider_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $riderId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $selectedRider = $result->fetch_assoc();
        }
    }

    $stmt->close();
}

$sqlAllRiders = "SELECT * FROM rider";
$resultAllRiders = mysqli_query($con, $sqlAllRiders);
$riderData = mysqli_fetch_all($resultAllRiders, MYSQLI_ASSOC);
$updatedName = '';
$updatedEmail = '';
$updatedPhone = '';
$updatedDob = '';
$updatedGender = '';
$updatedAddress = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updatedName = $_POST["name"];
    $updatedEmail = $_POST["email"];
    $updatedPhone = $_POST["phone"];
    $updatedDob = $_POST["dob"];
    $updatedGender = $_POST["gender"];
    $updatedAddress = $_POST["address"];

    $errors = array();
    if (empty($updatedName)) {
        $errors['name'] = "Name is required.";
    }
    if (empty($updatedEmail)) {
        $errors['email'] = "Email is required.";
    }
    if (empty($updatedPhone)) {
        $errors['phone'] = "Phone is required.";
    }
    if (empty($updatedDob)) {
        $errors['dob'] = "Date of Birth is required.";
    }
    if (empty($updatedGender)) {
        $errors['gender'] = "Gender is required.";
    }
    if (empty($updatedAddress)) {
        $errors['address'] = "Present Address is required.";
    }

    if (empty($errors)) {
        if ($selectedRider !== null) {
            $sql = "UPDATE rider SET name = ?, email = ?, phone = ?, dob = ?, gender = ?, address = ? WHERE rider_id = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssssssi", $updatedName, $updatedEmail, $updatedPhone, $updatedDob, $updatedGender, $updatedAddress, $riderId);

            if ($stmt->execute()) {

                $updateSuccess = true;
            } else {
                echo "Error updating rider: " . $stmt->error;
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
    <title>Update Rider</title>
    <link rel="stylesheet" type="text/css" href="update_rider.css">
    <script src="update_rider-validation.js" defer></script>
</head>

<body>
    <div class="container">
        <h1>Update Rider</h1>

        <?php if (!$updateSuccess): ?>
            <table border="1">
                <tr>
                    <th>Rider ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($riderData as $rider): ?>
                    <tr>
                        <td>
                            <?php echo $rider['rider_id']; ?>
                        </td>
                        <td>
                            <?php echo $rider['name']; ?>
                        </td>
                        <td>
                            <?php echo $rider['email']; ?>
                        </td>
                        <td>
                            <?php echo $rider['phone']; ?>
                        </td>
                        <td>
                            <?php echo $rider['dob']; ?>
                        </td>
                        <td>
                            <?php echo $rider['gender']; ?>
                        </td>
                        <td>
                            <?php echo $rider['address']; ?>
                        </td>
                        <td><a href="?id=<?php echo $rider['rider_id']; ?>">Update</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

        <?php if ($selectedRider !== null && !$updateSuccess): ?>
            <form method="post" autocomplete="off" novalidate onsubmit="return isValidUpdateRiderForm();">
                <input type="hidden" name="rider_id" value="<?php echo $selectedRider['rider_id']; ?>">
                <fieldset>
                    <legend>Rider Information</legend>
                    <table>
                        <div id="error-container" class="error-container"></div>

                        <tr>
                            <td><label for="name">Name:</label></td>
                            <td>
                                <input type="text" id="name" name="name" value="<?php echo $updatedName; ?>">
                                <?php if (isset($errors['name'])) {
                                    echo "<span class='error'>" . $errors['name'] . "</span>";
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="name">Name:</label></td>
                            <td><input type="email" id="email" name="email" value="<?php echo $updatedEmail; ?>">
                                <?php if (isset($errors['email'])) {
                                    echo "<span class='error'>" . $errors['email'] . "</span>";
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="email">Email:</label></td>
                            <td><input type="email" id="email" name="email" value="<?php echo $updatedEmail; ?>">
                                <?php if (isset($errors['email'])) {
                                    echo "<span class='error'>" . $errors['email'] . "</span>";
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="phone">Phone:</label></td>
                            <td><input type="text" id="phone" name="phone" value="<?php echo $updatedPhone; ?>">
                                <?php if (isset($errors['phone'])) {
                                    echo "<span class='error'>" . $errors['phone'] . "</span>";
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dob">Date of Birth:</label></td>
                            <td><input type="date" id="dob" name="dob" value="<?php echo $updatedDob; ?>">
                                <?php if (isset($errors['dob'])) {
                                    echo "<span class='error'>" . $errors['dob'] . "</span>";
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="gender">Gender:</label></td>
                            <td>
                                <select id="gender" name="gender">
                                    <option value="male" <?php if ($updatedGender === 'male')
                                        echo 'selected'; ?>>Male</option>
                                    <option value="female" <?php if ($updatedGender === 'female')
                                        echo 'selected'; ?>>Female
                                    </option>
                                    <option value="other" <?php if ($updatedGender === 'other')
                                        echo 'selected'; ?>>Other</option>
                                </select>
                                <?php if (isset($errors['gender'])) {
                                    echo "<span class='error'>" . $errors['gender'] . "</span>";
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="address">Address:</label></td>
                            <td><textarea id="address" name="address"><?php echo $updatedAddress; ?></textarea>
                                <?php if (isset($errors['address'])) {
                                    echo "<span class='error'>" . $errors['address'] . "</span>";
                                } ?>
                            </td>
                        </tr>
                    </table>
                    <div id="name-error"></div>
                    <div id="email-error"></div>
                    <div id="phone-error"></div>
                    <div id="dob-error"></div>
                    <div id="gender-error"></div>
                    <div id="address-error"></div>
                </fieldset>

                <input type="submit" value="Update Rider">
            </form>
        <?php endif; ?>

        <?php
        if ($updateSuccess) {
            echo "<p class='success'>Rider updated successfully!</p>";
        }
        ?>

        <a href="show_riders.php">Show Riders</a>
        <a href="dashboard.php">Back to dashboard</a>
    </div>
</body>

</html>


<?php include_once "footer.php"; ?>