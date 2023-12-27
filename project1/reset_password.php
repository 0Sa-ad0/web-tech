<?php
session_start();

if (!isset($_SESSION['reset'])) {
    header("Location: forget_password.php");
    exit();
}

$con = mysqli_connect('localhost', 'root', '', 'ridedb');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $username = isset($_POST['username']) ? $_POST['username'] : '';
    $username = $_SESSION['username'];
    $newPassword = isset($_POST['new_password']) ? $_POST['new_password'] : '';
    $confirmPassword = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

    if ($newPassword !== $confirmPassword) {
        $error = 'Passwords do not match.';
    } else {
        $stmt = $con->prepare('UPDATE reg SET password = ? WHERE username = ?');
        $stmt->bind_param('ss', $newPassword, $username);
        $stmt->execute();

        $successMessage = 'Password changed successfully. Click below to login.';
        unset($_SESSION['reset']);
        unset($_SESSION['username']);
    }
}

$username = isset($_GET['username']) ? $_GET['username'] : '';

if (empty($username)) {
    die("Invalid username.");
}
function sanitize_input($input)
{
    $input = trim($input);
    $input = strip_tags($input);
    $input = filter_var($input, FILTER_SANITIZE_STRING);
    return $input;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="reset_password.css">
</head>

<body>
    <header>
        <h1>Ride Sharing Management - Admin Panel</h1>
    </header>

    <main>
        <center>
            <h2>Reset Password</h2>

            <?php if (isset($error)): ?>
                <p>
                    <?php echo $error; ?>
                </p>
            <?php endif; ?>

            <form method="post" action="" autocomplete="off" novalidate>
                <fieldset>
                    <legend>Reset Password</legend>
                    <table>
                        <tr>
                            <td><label for="new_password">New Password:</label></td>
                            <td><input type="password" id="new_password" name="new_password"></td>
                        </tr>
                        <tr>
                            <td><label for="confirm_password">Confirm Password:</label></td>
                            <td><input type="password" id="confirm_password" name="confirm_password"></td>
                        </tr>
                    </table>
                </fieldset>
        </center>
        <br>
        <button type="submit">Reset Password</button>
        <br>

        <?php if (isset($successMessage)): ?>
            <p>
                <?php echo $successMessage; ?>
                <br>
                <br>
                <a href="login.php">Login</a>
            </p>
        <?php else: ?>
            </form>
        <?php endif; ?>

    </main>
</body>

</html>

<?php
$con->close();
?>

<?php include_once "footer.php"; ?>