<?php include_once "header1.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Booking</title>
    <link rel="stylesheet" type="text/css" href="user_booking.css">
    <script src="user_booking-validation.js" defer></script>
</head>

<body>
    <div class="container">
        <h1>User Booking</h1>

        <?php

        if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
            header("Location: login.php");
            exit();
        }

        $con = mysqli_connect('localhost', 'root', '', 'ridedb');
        if (!$con) {
            die("Database connection failed: " . mysqli_connect_error());
        }
        $fare = 100;
        $bookingId = 0;

        $serviceOptions = [
            1 => 'Honda',
            2 => 'Car',
            3 => 'CNG',
            4 => 'Helicopter',
        ];

        $service = isset($_POST['service']) ? $_POST['service'] : 1;

        $dropdownOptions = '';
        foreach ($serviceOptions as $serviceId => $serviceName) {
            $selected = ($serviceId == $service) ? 'selected' : '';
            $dropdownOptions .= "<option value=\"$serviceId\" $selected>$serviceName</option>";
        }
        ?>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST["confirm_booking"])) {

                $errors = [];

                $serviceId = filter_input(INPUT_POST, 'transportation', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $guests = filter_input(INPUT_POST, 'guests', FILTER_VALIDATE_INT);
                $startingPoint = filter_input(INPUT_POST, 'starting_point', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $destination = filter_input(INPUT_POST, 'destination', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $currentDateTime = new DateTime();
                $inputDateTime = new DateTime("$date $time");

                if ($inputDateTime < $currentDateTime) {
                    $errors[] = "Selected date and time must be in the future";
                }

                if (empty($serviceId)) {
                    $errors[] = "Service/Location is required";
                }
                if (empty($date)) {
                    $errors[] = "Date is required";
                }
                if (empty($time)) {
                    $errors[] = "Time is required";
                }
                if (empty($name)) {
                    $errors[] = "Name is required";
                }
                if (empty($phone)) {
                    $errors[] = "Phone Number is required";
                }
                if ($guests === false || $guests < 1) {
                    $errors[] = "Number of Guests/Participants must be at least 1";
                }
                if (empty($startingPoint)) {
                    $errors[] = "Starting Point is required";
                }
                if (empty($destination)) {
                    $errors[] = "Destination is required";
                }

                $fare = $guests * 100;

                if (empty($errors)) {

                    $sql = "INSERT INTO user_booking (transportation, date, time, name, phone, guests, starting_point, destination, fare) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("issssiisd", $serviceId, $date, $time, $name, $phone, $guests, $startingPoint, $destination, $fare);

                    if ($stmt->execute()) {
                        $bookingId = $con->insert_id;
                        $successMessage = "Booking confirmed! 
                    Booking ID: " . $bookingId . ", 
                    Transportation: " . $serviceOptions[$serviceId] . ", 
                    Date: " . $date . ", 
                    Time: " . $time . ", 
                    Name: " . $name . ", 
                    Phone Number: " . $phone . ", 
                    Number of Guests/Participants: " . $guests . ", 
                    Starting Point: " . $startingPoint . ", 
                    Destination: " . $destination . ", 
                    Fare: $ " . $fare;

                    } else {
                        echo "Error: " . $stmt->error;
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

        <form method="post" autocomplete="off" novalidate onsubmit="return isValidBookingForm();">
            <fieldset>
                <legend>Booking Information</legend>
                <table>
                    <tr>
                        <td><label for="transportation">Select Transportation:</label></td>
                        <td>
                            <select id="transportation" name="transportation">
                                <?php echo $dropdownOptions; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="date">Date:</label></td>
                        <td><input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="time">Time:</label></td>
                        <td><input type="time" id="time" name="time" min="<?php echo date('H:i'); ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="name">Name:</label></td>
                        <td><input type="text" id="name" name="name"></td>
                    </tr>
                    <tr>
                        <td><label for="phone">Phone Number:</label></td>
                        <td><input type="tel" id="phone" name="phone"></td>
                    </tr>
                    <tr>
                        <td><label for="guests">Number of Guests/Participants:</label></td>
                        <td><input type="number" id="guests" name="guests" min="1" value="1"></td>
                    </tr>
                    <tr>
                        <td><label for="starting_point">Starting Point:</label></td>
                        <td>
                            <select id="starting_point" name="starting_point">
                                <?php
                                $startingPoints = ['New York', 'Dhaka', 'Chittagong'];

                                foreach ($startingPoints as $point) {
                                    echo "<option value='" . strtolower(str_replace(' ', '_', $point)) . "'>$point</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><label for="destination">Destination:</label></td>
                        <td>
                            <select id="destination" name="destination">
                                <?php
                                $destinations = ['Chicago', 'Barishal', 'Rajshahi'];

                                foreach ($destinations as $destination) {
                                    echo "<option value='" . strtolower(str_replace(' ', '_', $destination)) . "'>$destination</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>


                    <tr>
                        <td><label for="fare">Fare Per Person (USD):</label></td>
                        <td><input type="text" id="fare" name="fare" value="<?php echo isset($fare) ? $fare : '100'; ?>"
                                readonly></td>
                    </tr>
                </table>
            </fieldset>
            <br>
            <div id="error-container" class="error-container"></div>
            <input type="submit" value="Confirm Booking">
        </form>

        <?php
        if (!empty($errors)) {
            echo '<div class="error-container">';
            echo '<ul>';
            foreach ($errors as $error) {
                echo '<li>' . $error . '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }

        if (isset($successMessage)) {
            echo '<div class="success-message">' . $successMessage . '</div>';
        }
        ?>
        <p><a href="dashboard.php">Back to Admin Dashboard</a></p>
    </div>
</body>

</html>

<?php include_once "footer.php"; ?>