<?php

session_start();

if (isset($_SESSION['user'])) {
    header("Location: home.php");
    exit();
}

$con = mysqli_connect('localhost', 'root', '', 'ridedb');
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

$securityQuestions = [
    "What is your favorite color?" => "",
    "What is your birthplace?" => "",
    "What is your mother's maiden name?" => "",
];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
    $last_name = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
    $email = isset($_POST["Email"]) ? $_POST["Email"] : "";
    $securityQuestion = isset($_POST["securityquestion"]) ? $_POST["securityquestion"] : "";
    $securityAnswer = isset($_POST['securityanswer']) ? $_POST["securityanswer"] : "";
    $user_name = isset($_POST['username']) ? $_POST["username"] : "";
    $pass_word = isset($_POST['password']) ? $_POST["password"] : "";
    $confirm_password = isset($_POST['confirmpassword']) ? $_POST["confirmpassword"] : "";

    $errors = [];


    $required_fields = ["firstname", "lastname", "Email", "username", "password", "confirmpassword"];

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "The field '$field' is mandatory.";
        }
    }

    $email = isset($_POST["Email"]) ? $_POST["Email"] : "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please provide a valid email address.";
    }


    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $confirmpassword = isset($_POST["confirmpassword"]) ? $_POST["confirmpassword"] : "";

    if ($password !== $confirmpassword) {
        $errors[] = "Password and Confirm Password do not match.";
    }

    if (empty($securityQuestion) || empty($securityAnswer)) {
        $errors[] = "Both Security Question and Answer are required.";
    } else {
        $con = mysqli_connect('localhost', 'root', '', 'ridedb');
        $stmt = $con->prepare("INSERT INTO reg (firstname, lastname, email, securityQuestion, securityAnswer, username, password) 
                VALUES (?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("sssssss", $first_name, $last_name, $email, $securityQuestion, $securityAnswer, $user_name, $pass_word);

        $stmt->execute();

        if ($stmt->errno) {
            echo "Error: " . $stmt->error;
        } else {
            $_SESSION['registration_success'] = true;

        }

        $stmt->close();

        if ($stmt) {
            $user = [
                'firstname' => trim($first_name),
                'lastname' => trim($last_name),
                'email' => trim($email),
                'securityQuestion' => trim($securityQuestion),
                'securityAnswer' => trim($securityAnswer),
                'username' => trim($user_name),
                'password' => trim($password),
            ];
            $_SESSION['user'] = $user;
            $_SESSION['registration_success'] = true;


        } else {
            echo "Registration failed.";
        }
        $con->close();
    }
}

function displayErrors($errors)
{
    if (!empty($errors)) {
        echo '<div>';
        echo '<ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }
}

function preFill($field)
{
    $value = isset($_SESSION['form_values'][$field]) ? htmlspecialchars($_SESSION['form_values'][$field]) : "";
    return $value;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link rel="stylesheet" href="registration.css">
    <script src="registration-validation.js"></script>
</head>

<body>
    <header>
        <center>
            <h1>Ride Sharing Management - Admin Panel</h1>
        </center>
    </header>

    <div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="application/x-www-form-urlencoded"
            autocomplete="off" novalidate onsubmit="return isValidRegistrationForm();">

            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname" value="<?php echo preFill('firstname'); ?>">

            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname" value="<?php echo preFill('lastname'); ?>">

            <label for="securityquestion">Security Question</label>
            <select name="securityquestion" id="securityquestion">
                <option value=''>Select a security question</option>
                <?php
                foreach ($securityQuestions as $question => $answer) {
                    echo "<option value='" . $question . "'>" . $question . "</option>";
                }
                ?>
            </select>

            <label for="securityanswer">Security Answer</label>
            <input type='text' name='securityanswer' id="securityanswer">

            <label for="Email">Email:</label>
            <input type="email" name="Email" id="Email" value="<?php echo preFill('Email'); ?>">

            <label for="username">Username</label>
            <input type="text" name="username" id="username"
                title="Username must be 1 to 5 characters long and can only contain letters and digits (no special characters)."
                value="<?php echo preFill('username'); ?>">

            <label for="password">Password</label>
            <input type="password" name="password" id="password" title="Password must be at least 8 characters long."
                value="<?php echo preFill('password'); ?>">

            <label for="confirmpassword">Confirm Password</label>
            <input type="password" name="confirmpassword" id="confirmpassword"
                title="Password must be at least 8 characters long and must match the password field."
                value="<?php echo preFill('confirmpassword'); ?>">


            <?php if (!empty($errors)): ?>
                <div class="error-container">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li>
                                <?php echo $error; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <p id="firstnameErrMsg">
            </p>
            <p id="lastnameErrMsg">
            </p>
            <p id="securityquestionErrMsg">
            </p>
            <p id="securityanswerErrMsg">
            </p>
            <p id="emailErrMsg">
            </p>
            <p id="usernameErrMsg">
            </p>
            <p id="passwordErrMsg">
            </p>
            <p id="confirmpasswordErrMsg">
            </p>

            <button type="submit">Registration</button>
            <p>Already have an Account? <a href="login.php">Click here</a> for Log in.</p>

        </form>

    </div>
    <?php if (isset($_SESSION['registration_success']) && $_SESSION['registration_success']): ?>
        <p>Registration Successful. <a href="login.php">Click here to Log in</a></p>
    <?php endif; ?>


</body>

</html>

<?php include_once "footer.php"; ?>