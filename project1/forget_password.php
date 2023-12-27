<?php
session_start();

$con = mysqli_connect('localhost', 'root', '', 'ridedb');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $securityQuestion = isset($_POST['securityQuestion']) ? $_POST['securityQuestion'] : '';
    $securityAnswer = isset($_POST['securityAnswer']) ? $_POST['securityAnswer'] : '';
    if (empty($username) || empty($securityQuestion) || empty($securityAnswer)) {
        $error = 'Please fill out all fields.';
    } else {
        $stmt = $con->prepare('SELECT * FROM reg WHERE username = ? AND securityQuestion = ? AND securityAnswer = ?');
        $stmt->bind_param('sss', $username, $securityQuestion, $securityAnswer);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            $successMessage = 'Match found. Click below to reset your password.';
            $_SESSION['reset'] = true;
            $_SESSION['username'] = $username;
        } else {
            $error = 'Invalid username, security question, or security answer.';
        }
    }
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
    <title>Forgot Password</title>
    <link rel="stylesheet" href="forget_password.css">
    <script src="forget_password-validation.js"></script>
</head>

<body>
    <header>
        <h1>Ride Sharing Management - Admin Panel</h1>
    </header>

    <main>
        <center>
            <h2>Forgot Password</h2>
            <?php if (!empty($error)): ?>
                <p>
                    <?php echo $error; ?>
                </p>
            <?php endif; ?>

            <form method="post" action="" autocomplete="off" novalidate onsubmit="return isValidForm();">
                <fieldset>
                    <legend>Reset Password</legend>
                    <table>
                        <tr>
                            <td><label for="Username">Username:</label></td>
                            <td><input type="text" id="Username" name="Username"></td>
                        </tr>
                        <tr>
                            <td><label for="securityQuestion">Security Question:</label></td>
                            <td>
                                <select id="securityQuestion" name="securityQuestion">
                                    <option value="" selected disabled>Select a security question</option>
                                    <option value="What is your favorite color?">What is your favorite color?</option>
                                    <option value="What is your birthplace?">What is your birthplace?</option>
                                    <option value="What is your mother's maiden name?">What is your mother's maiden
                                        name?</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="securityAnswer">Security Answer:</label></td>
                            <td><input type="text" id="securityAnswer" name="securityAnswer"></td>
                        </tr>
                    </table>
                </fieldset>

                <br>
                <button type="submit">New Password</button>
                <br>
                <br>

                <?php if (!empty($user)): ?>
                    <table>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                        <tr>
                            <td>
                                <?php echo htmlspecialchars($user['username']); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($user['email']); ?>
                            </td>
                        </tr>
                    </table>
                <?php endif; ?>
                <p id="error"></p>

                <br>

                <?php if (isset($successMessage)): ?>
                    <p>
                        <?php echo $successMessage; ?>
                    </p>
                    <p><a href="reset_password.php?username=<?php echo urlencode($username); ?>">Reset Password</a></p>
                <?php else: ?>
                </form>
            <?php endif; ?>
        </center>
    </main>
</body>

</html>


<?php
$con->close();
?>

<?php include_once "footer.php"; ?>