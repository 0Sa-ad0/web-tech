<?php include_once "header1.php"; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Rider</title>
    <link rel="stylesheet" type="text/css" href="add_rider.css">
    <script src="add_rider-validation.js" defer></script>
</head>

<body>
    <?php

    if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
        header("Location: login.php");
        exit();
    }

    $con = mysqli_connect('localhost', 'root', '', 'ridedb');
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $nameError = $emailError = $phoneError = $dobError = $genderError = $addressError = $successMessage = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $phone = test_input($_POST["phone"]);
        $dob = test_input($_POST["dob"]);
        $gender = test_input($_POST["gender"]);
        $address = test_input($_POST["address"]);

        if (empty($name)) {
            $nameError = "Name is required";
        }

        if (empty($email)) {
            $emailError = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format";
        }

        if (empty($phone)) {
            $phoneError = "Phone is required";
        }

        if (empty($dob)) {
            $dobError = "Date of Birth is required";
        }

        if (empty($gender)) {
            $genderError = "Gender is required";
        }

        if (empty($address)) {
            $addressError = "Present Address is required";
        }

        if (empty($nameError) && empty($emailError) && empty($phoneError) && empty($dobError) && empty($genderError) && empty($addressError)) {
            $sql = "INSERT INTO rider (name, email, phone, dob, gender, address) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssssss", $name, $email, $phone, $dob, $gender, $address);

            if ($stmt->execute()) {
                $successMessage = "Rider added successfully!";
            } else {
                echo "Error adding rider: " . $stmt->error;
            }
            $stmt->close();
        }
        mysqli_close($con);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <div class="container">
        <h1>Add Rider</h1>

        <form method="post" autocomplete="off" novalidate onsubmit="return isValidRiderForm();">
            <fieldset>
                <legend>Rider Information</legend>
                <table>
                    <tr>
                        <td><label for="name">Name:</label></td>
                        <td><input type="text" id="name" name="name"></td>
                        <td><span class="error" id="nameError">
                                <?php echo $nameError; ?>
                            </span></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input type="email" id="email" name="email"></td>
                        <td><span class="error" id="emailError">
                                <?php echo $emailError; ?>
                            </span></td>
                    </tr>
                    <tr>
                        <td><label for="phone">Phone:</label></td>
                        <td><input type="text" id="phone" name="phone"></td>
                        <td><span class="error" id="phoneError">
                                <?php echo $phoneError; ?>
                            </span></td>
                    </tr>
                    <tr>
                        <td><label for="dob">Date of Birth:</label></td>
                        <td><input type="date" id="dob" name="dob"></td>
                        <td><span class="error" id="dobError">
                                <?php echo $dobError; ?>
                            </span></td>
                    </tr>
                    <tr>
                        <td><label for="gender">Gender:</label></td>
                        <td>
                            <select id="gender" name="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </td>
                        <td><span class="error" id="genderError">
                                <?php echo $genderError; ?>
                            </span></td>
                    </tr>
                    <tr>
                        <td><label for="address">Present Address:</label></td>
                        <td><textarea id="address" name="address" rows="1" cols="1"></textarea></td>
                        <td><span class="error" id="addressError">
                                <?php echo $addressError; ?>
                            </span></td>
                    </tr>
                </table>
            </fieldset>

            <input type="submit" value="Add Rider">
        </form>

        <?php
        if (!empty($successMessage)) {
            echo "<p class='success'>$successMessage</p>";
        }
        ?>
        <a href="show_riders.php">Show Riders</a>

        <p><a href="dashboard.php">Back to Admin Dashboard</a></p>
    </div>
</body>

</html>
<?php include_once "footer.php"; ?>