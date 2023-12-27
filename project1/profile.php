<?php include_once "header1.php"; ?>


<?php
if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] === true) {
    $_SESSION['valid'] = true;
    $email = $_SESSION['Email'];
    $first_name = $_SESSION['firstName'];
    $last_name = $_SESSION['lastName'];

} else {
    header('Location: logout.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" type="text/css" href="profile.css">
</head>

<body>
    <div class="container">

        <header>
            <h1>Admin Profile</h1>
        </header>

        <main>

            <section class="general-info">
                <h2>General Information</h2>
                <img src="me.jpg" alt="Admin Image" class="admin-image">
                <p>Name: <strong>
                        <?php echo $first_name . ' ' . $last_name; ?>
                    </strong></p>
            </section>

            <section class="contact-info">
                <h2>Contact Information</h2>
                <p>Email: <i>
                        <?php echo $email; ?>
                    </i></p>
            </section>

            <section class="change-password">
                <p>Wanna Change Password for doubting safety?</p>
                <form action="change_password.php" method="get">
                    <button type="submit">OK, Click here</button>
                </form>
            </section>

            <p class="back-to-dashboard"><a href="dashboard.php">Back to Dashboard</a></p>

        </main>
    </div>

</body>

</html>



<?php include_once "footer.php"; ?>