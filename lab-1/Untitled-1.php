<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
</head>

<body>
    
    <form action="Untitled-2.php" method="POST" enctype="application/x-www-form-urlencoded" nonvalidate autocomplete="on">
        <fieldset style="width: 80%; margin: 0 auto; border-style: none;">
            <legend><h1>Profile</h1></legend>
            <table>
                <tr>
                    <td style="vertical-align: center;">
                        <fieldset>
                            <legend>General Information:</legend>
                            <table>
                                <tr>
                                    <td><label for="first-name"><strong>First Name:</strong></label></td>
                                    <td><input type="text" id="first-name" name="first-name" value="Mir Md." /></td>
                                    <td rowspan="8"><input type="file" id="profile-image" name="profile-image" accept="image/*" width="150px" height="100px"></td>
                                </tr>
                                <tr>
                                    <td><label for="last-name"><strong>Last Name:</strong></label></td>
                                    <td><input type="text" id="last-name" name="last-name" value="Kawsur" /></td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                    <td style="vertical-align: center;">
                        <fieldset>
                            <legend>Contact Information:</legend>
                            <table>
                                <tr>
                                    <td><label for="email"><strong>Email:</strong></label></td>
                                    <td><input type="email" id="email" name="email" value="MirMdKawsur0@gmail.com" /></td>
                                </tr>
                                <tr>
                                    <td><label for="phone"><strong>Phone (Mobile):</strong></label></td>
                                    <td><input type="tel" id="phone" name="phone" value="00000000000" /></td>
                                </tr>
                                <tr>
                                    <td><label for="website"><strong>Website:</strong></label></td>
                                    <td><input type="url" id="website" name="website" value="https://kawur.me" /></td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>
            </table>
            <input type="submit" value="Submit" />
        </fieldset>
    </form>
</body>

</html>
