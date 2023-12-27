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

function getEarnings($con)
{
    $earnings = [];

    $sql = "SELECT * FROM earning";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $earnings[] = $row;
            }
            mysqli_free_result($result);
        }
        $stmt->close();
    } else {
        die("Prepared statement error: " . $con->error);
    }
    return $earnings;
}

$earnings = getEarnings($con);
mysqli_close($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Earnings</title>
    <link rel="stylesheet" type="text/css" href="show_earnings.css">
</head>

<body>
    <div class="container">
        <h1>Show Earnings</h1>

        <table class="earning-table">
            <tr>
                <th>Earning ID</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
            <?php foreach ($earnings as $earning): ?>
                <tr>
                    <td>
                        <?php echo $earning["earning_id"]; ?>
                    </td>
                    <td>
                        <?php echo $earning["amount"]; ?>
                    </td>
                    <td>
                        <?php echo $earning["date"]; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <p><a href="dashboard.php">Back to Admin Dashboard</a></p>
    </div>
</body>

</html>



<?php include_once "footer.php"; ?>