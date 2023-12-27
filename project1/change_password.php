<?php
include_once "header1.php";

if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
    header("Location: login.php");
    exit();
}

$con = mysqli_connect('localhost', 'root', '', 'ridedb');
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['changePassword'])) {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $email = isset($_SESSION['Email']) ? $_SESSION['Email'] : '';

    $query = "SELECT password FROM reg WHERE email = ?";    //SOLVED AND CONFUSION
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Database error: " . mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        $_SESSION['passwordChangeError'] = "User not found in the database";

    } elseif ($currentPassword !== $row['password']) {
        $_SESSION['passwordChangeError'] = "Current password is incorrect";

    } elseif ($newPassword !== $confirmPassword) {
        $_SESSION['passwordChangeError'] = "New password and confirm password do not match";

    } else {
        $updateQuery = "UPDATE reg SET password = ? WHERE email = ?"; //SOLVED AND CONFUSION
        $updateStmt = mysqli_prepare($con, $updateQuery);

        mysqli_stmt_bind_param($updateStmt, "ss", $newPassword, $email);
        $updateResult = mysqli_stmt_execute($updateStmt);



        if (!$updateResult) {
            $_SESSION['passwordChangeError'] = "Password change failed";

        } else {
            $_SESSION['user']['password'] = $newPassword;
            $_SESSION['passwordChangeSuccess'] = "Password changed successfully. <a href='login.php'>Click here to login</a>";

        }
    }
}
if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {

    $_SESSION['passwordChangeError'] = "Please fill in all fields.";

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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="changed_password.css">
    <script src="change_password-validation.js" defer></script>
</head>

<!-- defer Attribute:

The defer attribute is used to indicate that the script should be executed after the HTML document has been completely parsed.
This helps ensure that the script doesn't block HTML parsing and allows the HTML to load faster.
The defer attribute is particularly useful when placing the <script> tag in the <head> section. -->

<body>
    <div class="container">
        <h1>Change Password</h1>
        <form id="changePasswordForm" action="" method="post" novalidate onsubmit="return isValidForm(event);">
            <fieldset>
                <legend>Change Password</legend>
                <table>

                    <tr>
                        <td><label for="currentPassword">Current Password:</label></td>
                        <td><input type="password" id="currentPassword" name="currentPassword"></td>
                    </tr>
                    <tr>
                        <td><label for="newPassword">New Password:</label></td>
                        <td><input type="password" id="newPassword" name="newPassword"></td>
                    </tr>
                    <tr>
                        <td><label for="confirmPassword">Confirm Password:</label></td>
                        <td><input type="password" id="confirmPassword" name="confirmPassword"></td>
                    </tr>
                </table>
            </fieldset>

            <div id="passwordChangeError" class="passwordChangeError"></div>

            <br>
            <input type="submit" name="changePassword" value="Change Password">
            <br>
            <?php if (isset($_SESSION['passwordChangeSuccess'])): ?>
                <p>
                    <?php echo $_SESSION['passwordChangeSuccess']; ?>
                </p>
                <?php unset($_SESSION['passwordChangeSuccess']); ?>

            <?php elseif (isset($_SESSION['passwordChangeError'])): ?>
                <p>
                    <?php echo $_SESSION['passwordChangeError']; ?>
                </p>
                <?php unset($_SESSION['passwordChangeError']); ?>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>


<?php include_once "footer.php"; ?>