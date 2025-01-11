<?php include_once "header1.php"; ?>

<?php

if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['log'])) {
    unset($_POST['log']);

    $data = sanitizeAndValidateData($_POST);

    if ($data) {
        $con = mysqli_connect('localhost', 'root', '', 'ridedb');
        if (!$con) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        $amount = $data['amount'];
        $date = $data['date'];

        $sql = "INSERT INTO earning (amount, date) VALUES (?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ds", $amount, $date);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Earning added successfully!";
        } else {
            echo "Something went wrong";
        }

        $stmt->close();
        mysqli_close($con);
    }
}

function sanitizeAndValidateData($data)
{
    $amount = filter_var($data['amount'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $date = filter_var($data['date'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (empty($amount) || empty($date)) {
        echo "Amount and Date are required fields.";
        return false;
    }


    return [
        'amount' => $amount,
        'date' => $date
    ];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Earning</title>
    <link rel="stylesheet" type="text/css" href="add_earning.css">
    <script src="add_earning-validation.js" defer></script>
</head>

<body>
    <div class="container">
        <h1>Add Earning</h1><br>

        <form id="earningForm" method="post" action="" autocomplete="off" novalidate onsubmit="return isValidEarningForm();">

            <fieldset>
                <legend>Earning Information</legend>
                <table>
                    <tr>
                        <td><label for="amount"><b>Amount:</b></label></td>
                        <td><input type="text" name="amount" id="amount" placeholder="Amount"></td>
                    </tr>
                    <tr>
                        <td><label for="date"><b>Date:</b></label></td>
                        <td><input type="date" name="date" id="date" placeholder="Date"></td>
                    </tr>
                </table>
            </fieldset>
            <br>
            <p id="error-message"></p>
            <input type="submit" name="log" id="log" value="Add Earning">
            <br><br>
        </form>

        <?php
        if (isset($_SESSION['success_message'])) {
            echo "<p class='success'>" . $_SESSION['success_message'] . "</p>";
            unset($_SESSION['success_message']);
        }
        ?>

        <a href="show_earnings.php">Show Earnings</a>
        <br>
        <br>
        <a href="dashboard.php">Back to Admin dashboard</a>
    </div>
</body>

</html>



<?php include_once "footer.php"; ?>