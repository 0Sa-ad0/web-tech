<?php include_once "header1.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Riders</title>
    <link rel="stylesheet" type="text/css" href="show_riders.css">
</head>

<body>
    <?php

    if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
        header("Location: login.php");
        exit();
    }
    $riderData = array();

    $con = mysqli_connect('localhost', 'root', '', 'ridedb');
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM rider";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->execute();

        $result = $stmt->get_result();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $riderData[] = $row;
            }
        }
    } else {
        die("Prepared statement error: " . $con->error);
    }
    mysqli_close($con);


    ?>

    <div class="container">
        <h1>Show Riders</h1>

        <table border="1">
            <tr>
                <th>Rider ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Present Address</th>
            </tr>
            <?php
            foreach ($riderData as $rider) {
                echo "<tr>";
                echo "<td>{$rider['rider_id']}</td>";
                echo "<td>{$rider['name']}</td>";
                echo "<td>{$rider['email']}</td>";
                echo "<td>{$rider['phone']}</td>";
                echo "<td>{$rider['dob']}</td>";
                echo "<td>{$rider['gender']}</td>";
                echo "<td>{$rider['address']}</td>";
                echo "</tr>";
            }
            ?>
        </table>

        <p><a href="dashboard.php">Back to Admin Dashboard</a></p>
    </div>
</body>

</html>


<?php include_once "footer.php"; ?>