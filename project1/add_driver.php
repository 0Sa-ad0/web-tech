<?php include_once "header1.php"; ?>

<?php

if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
    header("Location: login.php");
    exit();
}

$nameError = $emailError = $licenseError = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST["name"]) ? test_input($_POST["name"]) : "";
    $email = isset($_POST["email"]) ? test_input($_POST["email"]) : "";
    $license = isset($_POST["license"]) ? test_input($_POST["license"]) : "";

    if (empty($name)) {
        $nameError = "Name is required";
    }

    if (empty($email)) {
        $emailError = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format";
    }

    if (empty($license)) {
        $licenseError = "License Number is required";
    }

    if (empty($nameError) && empty($emailError) && empty($licenseError)) {
        $con = mysqli_connect('localhost', 'root', '', 'ridedb');
        if (!$con) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO driver (name, email, license) VALUES (?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $license);

        if ($stmt->execute()) {
            $successMessage = "Driver added successfully!";
        } else {
            $successMessage = "Error adding driver: " . $con->error;
        }

        $stmt->close();
        $con->close();
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
    <title>Add Driver</title>
    <link rel="stylesheet" type="text/css" href="add_driver.css">
    <script src="add_driver-validation.js"></script>
</head>

<body>
    <div class="container">
        <h1>Add Driver</h1>

        <form action="" method="post" novalidate onsubmit="return isValidForm();">
            <fieldset>
                <legend>Driver Information</legend>
                <table>
                    <tr>
                        <td><label for="name">Name:</label></td>
                        <td><input type="text" id="name" name="name"></td>
                        <td><span class="error">
                                <?php echo $nameError; ?>
                            </span></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input type="email" id="email" name="email"></td>
                        <td><span class="error">
                                <?php echo $emailError; ?>
                            </span></td>
                    </tr>
                    <tr>
                        <td><label for="license">License Number:</label></td>
                        <td><input type="text" id="license" name="license"></td>
                        <td><span class="error">
                                <?php echo $licenseError; ?>
                            </span></td>
                    </tr>
                </table>
            </fieldset>
            <br>
            <input type="submit" value="Add Driver">

        </form>

        <?php
        if (!empty($successMessage)) {
            echo "<p class='success'>$successMessage</p>";
        }
        ?>
        <br>
        <a href="show_drivers.php">Show Drivers</a>
        <br>
        <br>
        <a href="dashboard.php">Back to Admin Dashboard</a>
    </div>
    <div id="nameError"></div>
    <div id="emailError"></div>
    <div id="licenseError"></div>
    <div id="errorElement"></div>
</body>

</html>


<?php include_once "footer.php"; ?>