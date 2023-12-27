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


$nameError = $emailError = $usernameError = $passwordError = $roleError = $confirmPasswordError = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    $confirmPassword = test_input($_POST["confirm_password"]);
    $role = test_input($_POST["role"]);

    if (empty($name)) {
        $nameError = "Name is required";
    }

    if (empty($email)) {
        $emailError = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format";
    }

    if (empty($username)) {
        $usernameError = "Username is required";
    }

    if (empty($password)) {
        $passwordError = "Password is required";
    } elseif ($password !== $confirmPassword) {
        $confirmPasswordError = "Passwords do not match";
    }

    if (empty($role)) {
        $roleError = "Role is required";
    }


    if (empty($nameError) && empty($emailError) && empty($usernameError) && empty($passwordError) && empty($roleError) && empty($confirmPasswordError)) {
        $sql = "INSERT INTO admin (name, email, username, password, role) VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssss", $name, $email, $username, $password, $role);

        if ($stmt->execute()) {
            $successMessage = 'Assistant Admin added successfully!';
        } else {
            echo "Error adding assistant admin: " . $stmt->error;
        }
        $stmt->close();
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Assistant Admin</title>
    <link rel="stylesheet" type="text/css" href="add_admin.css">
    <script src="add_admin-validation.js" defer></script>
</head>

<body>
    <div class="container">
        <h1>Add Assistant Admin</h1>

        <form method="post" autocomplete="off" novalidate onsubmit="return isValid(this);">
            <fieldset>
                <legend>Admin Information</legend>
                <table>
                    <tr>
                        <td><label for="name">Name:</label></td>
                        <td><input type="text" id="name" name="name"></td>
                        <td><span class="error" id="nameError">
                                <?php echo $nameError; ?>
                            </span></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input type="email" id="email" name="email"></td>
                        <td><span class="error" id="emailError">
                                <?php echo $emailError; ?>
                            </span></td>
                    </tr>
                    <tr>
                        <td><label for="username">Username:</label></td>
                        <td><input type="text" id="username" name="username"></td>
                        <td><span class="error" id="usernameError">
                                <?php echo $usernameError; ?>
                            </span></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password:</label></td>
                        <td><input type="password" id="password" name="password"></td>
                        <td><span class="error" id="passwordError">
                                <?php echo $passwordError; ?>
                            </span></td>
                    </tr>
                    <tr>
                        <td><label for="confirm_password">Confirm Password:</label></td>
                        <td><input type="password" id="confirm_password" name="confirm_password"></td>
                        <td><span class="error" id="confirmPasswordError">
                                <?php echo $confirmPasswordError; ?>
                            </span></td>
                    </tr>
                    <tr>
                        <td><label for="role">Role:</label></td>
                        <td>
                            <select id="role" name="role">
                                <option value="read-only">Read-Only</option>
                                <option value="limited-access">Limited Access</option>
                                <option value="full-access">Full Access</option>
                                <option value="manager">Manager</option>
                                <option value="supervisor">Supervisor</option>
                                <option value="auditor">Auditor</option>
                            </select>
                        </td>
                        <td><span class="error" id="roleError">
                                <?php echo $roleError; ?>
                            </span></td>
                    </tr>
                </table>
            </fieldset>

            <input type="submit" value="Add Admin">
        </form>

        <?php if (!empty($successMessage)): ?>
            <p class="success">
                <?php echo $successMessage; ?>
            </p>
        <?php endif; ?>
        <a href="show_admin.php">Show Admins</a>
        <p><a href="dashboard.php">Back to Admin Dashboard</a></p>
    </div>
</body>

</html>



<?php include_once "footer.php"; ?>