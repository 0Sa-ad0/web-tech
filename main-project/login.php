<?php
session_start();

$con = mysqli_connect('localhost', 'root', '', 'ridedb');
if($con->connect_error) {
    die("Connection failed: ".$con->connect_error);
}

if(isset($_COOKIE['emailid']) && isset($_COOKIE['password'])) {
    $email = $_COOKIE['emailid'];
    $password = $_COOKIE['password'];
} else {
    $email = $password = "";
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST['email']) || empty($_POST['password'])) {
        $_SESSION['emailErr'] = empty($_POST['email']) ? "Email is required" : "";
        $_SESSION['passwordErr'] = empty($_POST['password']) ? "Password is required" : "";
        header("Location: login.php");
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM reg WHERE email = ? AND password = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if($user) {
            $_SESSION['adminLogin'] = true;
            $_SESSION['Email'] = $email;
            $_SESSION['firstName'] = $user['firstname'];
            $_SESSION['lastName'] = $user['lastname'];

            if($result->num_rows > 0) {
                $data = mysqli_fetch_array($result);
                $last_name = $data['lastname'];
                $_SESSION['lastname'] = $last_name;

                if(isset($_REQUEST['rememberMe'])) {
                    setcookie('emailid', $_REQUEST['email'], time() + 30);
                    setcookie('password', $_REQUEST['password'], time() + 30);
                } else {
                    setcookie('emailid', $_REQUEST['email'], time() - 10); // 10 seconds
                    setcookie('password', $_REQUEST['password'], time() - 999999999); // 10 seconds
                }
                header('location:welcome.php');
                exit();
            }

        } else {
            $_SESSION['emailErr'] = "Invalid email";
            $_SESSION['passwordErr'] = "Invalid password";
            header("Location: login.php");
        }
    }
}

function sanitize_input($input) {
    $input = trim($input);
    $input = strip_tags($input);
    $input = filter_var($input, FILTER_SANITIZE_STRING);
    return $input;
}

$con->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="login-validation.js"></script>
</head>
<header>

    <h1>Ride Sharing Management - Admin Panel</h1>

</header>


<body>
    <center>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off" novalidate onsubmit="return isValid(this);">
            <fieldset>
                <legend>Login</legend>
                <table>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email"
                                value="<?php echo isset($_COOKIE['emailid']) ? $_COOKIE['emailid'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password"
                                value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="checkbox" name="rememberMe" id="rememberMe">
                            <label for="rememberMe">Remember me</label>
                        </td>
                    </tr>
                </table>
                <br>
                <?php if(isset($_SESSION['emailErr'])): ?>
                    <p>
                        <?php echo $_SESSION['emailErr']; ?>
                    </p>
                <?php endif; ?>
                <?php if(isset($_SESSION['passwordErr'])): ?>
                    <p>
                        <?php echo $_SESSION['passwordErr']; ?>
                    </p>
                <?php endif; ?>

                <!-- JS VALIDATION  -->

                <p id="emailErrMsg">
                    <?php if(isset($_SESSION['emailErr']))
                        echo $_SESSION['emailErr']; ?>
                </p>
                <p id="passwordErrMsg">
                    <?php if(isset($_SESSION['passwordErr']))
                        echo $_SESSION['passwordErr']; ?>

            </fieldset>
            <br>

            <input type="submit" value="Login">
            <br>
            <br>


        </form>
        <form action="forget_password.php" method="get">
            <input type="submit" value="Forget Password">
        </form>
        <p>
            Don't have an Account? <a href="registration.php">Click here</a> for Registration.
        </p>
    </center>
</body>

</html>

<?php include_once "footer.php"; ?>