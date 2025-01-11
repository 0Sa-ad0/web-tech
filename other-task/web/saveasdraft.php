<?php
$draft_data = [];
$last_modified = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['save_draft'])) {
        $draft_data = [
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'father\'sname' => $_POST['father\'sname'],
            'mother\'sname' => $_POST['mother\'sname'],
            'gender' => $_POST['gender'],
            'bloodgroup' => $_POST['bloodgroup'],
            'Religion' => $_POST['Religion'],
            'Email' => $_POST['Email'],
            'Phone/Mobile' => $_POST['Phone/Mobile'],
            'Website' => $_POST['Website'],
            'country' => $_POST['country'],
            'Division' => $_POST['Division'],
            'rsc' => $_POST['rsc'],
            'postcode' => $_POST['postcode'],
            'username' => $_POST['username'],
        ];

        $last_modified = date("Y-m-d H:i:s");
        setcookie('draft_data', serialize($draft_data), time() + 120); // Save draft data in a cookie for 2 minutes
        setcookie('last_modified', $last_modified, time() + 120);
    } elseif (isset($_POST['submit_registration'])) {
        // Validation for Registration
        {
            $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
            $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
            $fathers_name = isset($_POST["father'sname"]) ? $_POST["father'sname"] : "";
            $mothers_name = isset($_POST["mother'sname"]) ? $_POST["mother'sname"] : "";
            $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
            $blood_group = isset($_POST["bloodgroup"]) ? $_POST["bloodgroup"] : "";
            $religion = isset($_POST["Religion"]) ? $_POST["Religion"] : "";
            $email = isset($_POST["Email"]) ? $_POST["Email"] : "";
            $phone = isset($_POST["Phone/Mobile"]) ? $_POST["Phone/Mobile"] : "";
            $website = isset($_POST["Website"]) ? $_POST["Website"] : "";
            $country = isset($_POST["country"]) ? $_POST["country"] : "";
            $division = isset($_POST["Division"]) ? $_POST["Division"] : "";
            $present_address = isset($_POST["rsc"]) ? $_POST["rsc"] : "";
            $postal_code = isset($_POST["postcode"]) ? $_POST["postcode"] : "";
            $username = isset($_POST["username"]) ? $_POST["username"] : "";
            $password = isset($_POST["password"]) ? $_POST["password"] : "";
            $confirm_password = isset($_POST["confirmpassword"]) ? $_POST["confirmpassword"] : "";

            if (empty($errors)) {
                // Perform the registration process
                if (!empty($errors)) {
                    echo "<div><ul>";
                    foreach ($errors as $error) {
                        echo "<li>" . htmlspecialchars($error) . "</li>";
                    }
                    echo "</ul></div>";
                }

                // Clear draft data cookies after successful registration
                setcookie('draft_data', '', time() - 3600); // Expire the draft data cookie
                setcookie('last_modified', '', time() - 3600); // Expire the last modified date cookie

                // Redirect to a success page if needed
                // header("Location: success.php");
                // exit();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="application/x-www-form-urlencoded" autocomplete="on" novalidate>
        <h1>Registration</h1>
        <table>
            <tr>
                <td>
                    <fieldset>
                        <legend>General Information:</legend>
                        <table>
                            <tr>
                                <td>
                                    <p>
                                        <label for="firstname">First Name</label>
                                    </p>
                                    <p>
                                        <label for="lastname">Last Name</label>
                                    </p>
                                    <p>
                                        <label for="father'sname">Father's Name</label>
                                    </p>
                                    <p>
                                        <label for="mother'sname">Mother's Name</label>
                                    </p>
                                    <p>
                                        <label for="dob">Date of Birth</label>
                                    </p>
                                    <p>
                                        <label for="gender">Gender</label>
                                    </p>
                                    <p>
                                        <label for="bloodgroup">Blood Group</label>
                                    </p>
                                    <p>
                                        <label for="Religion">Religion</label>
                                    </p>
                                    <p>
                                        <label for="nationalid">National ID</label>
                                    </p>
                                    <p>
                                        <label for="passport">Passport Number</label>
                                    </p>
                                    <p>
                                        <label for="maritalstatus">Marital Status</label>
                                    </p>
                                </td>
                                <td>
                                    <p>: <input type="text" name="firstname" id="firstname" value="<?php echo preFill('firstname'); ?>">
                                    </p>
                                    <p>: <input type="text" name="lastname" id="lastname" value="<?php echo preFill('lastname'); ?>">
                                    </p>
                                    <p>: <input type="text" name="father'sname" id="father'sname" value="<?php echo preFill("father'sname"); ?>">
                                    </p>
                                    <p>: <input type="text" name="mother'sname" id="mother'sname" value="<?php echo preFill("mother'sname"); ?>">
                                    </p>
                                    <p>: <input type="date" name="dob" id="dob">
                                    </p>
                                    <p> : <input type="radio" id="male" name="gender" value="male">
                                        <label for="male">Male</label>
                                        <input type="radio" id="female" name="gender" value="female">
                                        <label for="female">Female</label>
                                        <input type="radio" id="other" name="gender" value="other">
                                        <label for="other">Other</label>
                                    </p>
                                    <p> : <select name="bloodgroup" id="bloodgroup">
                                            <option value="" selected>Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </p>
                                    <p>
                                        <input type="radio" id="Muslim" name="Religion" value="Muslim">
                                        <label for="Muslim">Muslim</label>
                                        <input type="radio" id="Hindu" name="Religion" value="Hindu">
                                        <label for="Hindu">Hindu</label>
                                        <input type="radio" id="Christian" name="Religion" value="Christian">
                                        <label for="Christian">Christian</label>
                                        <input type="radio" id="Buddhist" name="Religion" value="Buddhist">
                                        <label for="Buddhist">Buddhist</label>
                                    </p>
                                    <p>: <input type="text" name="nationalid" id="nationalid">
                                    </p>
                                    <p>: <input type="text" name="passport" id="passport">
                                    </p>
                                    <p> : <select name="maritalstatus" id="maritalstatus">
                                            <option value="" selected>Select Marital Status</option>
                                            <option value="single">Single</option>
                                            <option value="married">Married</option>
                                            <option value="divorced">Divorced</option>
                                            <option value="widowed">Widowed</option>
                                        </select>
                                    </p>
                                </td>
                                <td>
                                    <!--<input type="file" id="profile-image" name="profile-image" accept="image/*" width="150px" height="100px">-->
                                    <!--<label for="profile-image">Profile Image</label>-->
                                    <input type="file" id="profile-image" name="profile-image" accept="image/*">
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                        <legend>Contact Information:</legend>
                        <table>
                            <tr>
                                <td>
                                    <p>
                                        <label for="Email">Email:</label>
                                    </p>
                                    <p>
                                        <label for="Phone/Mobile">Phone/Mobile:</label>
                                    </p>
                                    <p>
                                        <label for="Website">Website:</label>
                                    </p>
                                </td>
                                <td>
                                    <p>: <input type="email" name="Email" id="Email" value="<?php echo preFill('Email'); ?>">
                                    </p>
                                    <p>: <input type="text" name="Phone/Mobile" id="Phone/Mobile" value="<?php echo preFill('Phone/Mobile'); ?>">
                                    </p>
                                    <p>: <input type="url" name="Website" id="Website" value="<?php echo preFill('Website'); ?>">
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="Address">Address:</label>
                                </td>
                                <td>
                                    <p>
                                    <fieldset>
                                        <legend>Present Address</legend>
                                        <table>
                                            <tr>
                                                <td>
                                                    <p>
                                                        <select name="country" id="country">
                                                            <option value="" selected>Select Country</option>
                                                            <option value="USA">USA</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="UK">UK</option>
                                                            <option value="Bangladesh">Bangladesh</option>
                                                        </select>
                                                        <select name="Division" id="Division">
                                                            <option value="" selected>Select Division</option>
                                                            <option value="Dhaka">Dhaka</option>
                                                            <option value="Chottogram">Chottogram</option>
                                                            <option value="Khulna">Khulna</option>
                                                            <option value="Rangpur">Rangpur</option>
                                                        </select>
                                                    </p>
                                                    <p>
                                                        <textarea name="rsc" id="rsc" placeholder="Road/Street/City" rows="6" cols="30"><?php echo preFill('rsc'); ?></textarea>
                                                    </p>
                                                    <p>
                                                        <input type="text" name="postcode" id="postcode" placeholder="Post Code" value="<?php echo preFill('postcode'); ?>">
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </fieldset>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                        <legend>Account Information:</legend>
                        <table>
                            <tr>
                                <td>
                                    <p>
                                        <label for="username">Username</label>
                                    </p>
                                    <p>
                                        <label for="password">Password</label>
                                    </p>
                                    <p>
                                        <label for="confirmpassword">Confirm Password</label>
                                    </p>
                                </td>
                                <td>
                                    <p>: <input type="text" name="username" id="username" title="Username must be 1 to 5 characters long and can only contain letters and digits (no special characters)." value="<?php echo preFill('username'); ?>">
                                    </p>
                                    <p>: <input type="password" name="password" id="password" title="Password must be at least 8 characters long." value="<?php echo preFill('password'); ?>">
                                    </p>
                                    <p>: <input type="password" name="confirmpassword" id="confirmpassword" title="Password must be at least 8 characters long and must match the password field." value="<?php echo preFill('confirmpassword'); ?>">
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>
        <p>
            <button type="submit" name="save_draft">Save as Draft</button>
            <button type="submit" name="submit_registration">Registration</button>
        </p>

        <?php
        if (!empty($draft_data)) {
            echo '<p>Last Modified: ' . $last_modified . '</p>';
        }
        ?>

        <?php
        foreach ($draft_data as $key => $value) {
            echo '<input type="hidden" name="' . $key . '" value="' . htmlspecialchars($value) . '">';
        }
        ?>
    </form>
</body>

</html>