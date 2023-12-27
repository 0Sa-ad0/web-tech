<?php include_once "header.php"; ?>

<?php
session_start();

if (!isset($_SESSION['adminLogin']) || $_SESSION['adminLogin'] !== true) {
    header("Location: login.php");
    exit();
}

// Assuming you have a session variable storing user information
// $first_name = isset($_SESSION['firstName']) ? $_SESSION['firstName'] : '';
// $last_name = isset($_SESSION['lastName']) ? $_SESSION['lastName'] : '';

$first_name = isset($_SESSION['firstName']) ? sanitize_input($_SESSION['firstName']) : '';
$last_name = isset($_SESSION['lastName']) ? sanitize_input($_SESSION['lastName']) : '';

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
    <title>Welcome</title>
    <link rel="stylesheet" href="welcome.css">
</head>

<body>
    <center>
        <div>
            <h2>Home Page</h2>
            <?php if (!empty($first_name) && !empty($last_name)): ?>
                <p>Welcome,,,<strong>
                        <?php echo $last_name . ', ' . $first_name; ?>
                    </strong>
                </p>

                <p>This is home page.</p>
            <?php else: ?>
                <p>Welcome to the home page.</p>
            <?php endif; ?>
        </div>

    </center>
</body>

</html>
<?php include_once "footer.php"; ?>