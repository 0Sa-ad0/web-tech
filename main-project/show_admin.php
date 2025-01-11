<?php include_once "header1.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Admins</title>
    <link rel="stylesheet" type="text/css" href="show_admin.css">
    <script type="text/javascript" src="search_admin.js"></script>
</head>

<body>
    <?php
    if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
        header("Location: login.php");
        exit();
    }
    ?>

    <div class="container">
        <!-- <h1>Show Administrators</h1> -->
        <div id="fullInfo"></div>

        <div class="header">
            <h1>Show Administrators</h1>
            <div class="search-container">
                <button onclick="search()" style="float:right">Search</button>
                <input type="text" id="searchInput" placeholder="Search..." style="float:right">
            </div>
        </div>

        <table class="admin-table">
            <tr>
                <th>Admin ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Role</th>
            </tr>

            <?php
            $con = mysqli_connect('localhost', 'root', '', 'ridedb');

            if (!$con) {
                die("Database connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM admin";
            $stmt = $con->prepare($sql);

            if ($stmt) {
                $stmt->execute();

                $result = $stmt->get_result();
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['admin_id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['role'] . "</td>";
                        echo "</tr>";
                    }

                    mysqli_free_result($result);
                } else {
                    echo "Error: " . mysqli_error($con);
                }

                $stmt->close();
            } else {
                echo "Prepared statement error: " . $con->error;
            }

            mysqli_close($con);
            ?>
        </table>

        <div id="noDataFound" style="display:none; text-align: center; margin-top: 10px;">
            No Data Found
        </div>

        <p><a href="dashboard.php">Back to Admin Dashboard</a></p>
    </div>
</body>

</html>

<?php include_once "footer.php"; ?>