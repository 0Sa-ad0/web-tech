<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
</head>

<body>
    <form action="lab-2.3.php" method="POST" enctype="application/x-www-form-urlencoded" nonvalidate autocomplete="on">
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
                                    <td><input type="text" id="first-name" name="first-name" value="TOUHIDUL ISLAM" /></td>
                                    <td rowspan="8"><input type="file" id="profile-image" name="profile-image" accept="image/*" width="150px" height="100px"></td>
                                </tr>
                                <tr>
                                    <td><label for="last-name"><strong>Last Name:</strong></label></td>
                                    <td><input type="text" id="last-name" name="last-name" value="SAAD" /></td>
                                </tr>
                                <tr>
                                    <td><strong>Gender:</strong></td>
                                    <td>
                                        <input type="radio" id="male" name="gender" value="Male">
                                        <label for="male">Male</label>
                                        <input type="radio" id="female" name="gender" value="Female">
                                        <label for="female">Female</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="father-name"><strong>Father's Name:</strong></label></td>
                                    <td><input type="text" id="father-name" name="father-name" value="XYZ" /></td>
                                </tr>
                                <tr>
                                    <td><label for="mother-name"><strong>Mother's Name:</strong></label></td>
                                    <td><input type="text" id="mother-name" name="mother-name" value="ZYX" /></td>
                                </tr>
                                
                                <tr>
                                    <td><label for="blood-group"><strong>Blood Group:</strong></label></td>
                                    <td>
                                        <select id="blood-group" name="blood-group">
                                            <option value="O+">O+</option>
                                            <option value="A+">A+</option>
                                            <option value="AB+">AB+</option>
                                            <option value="B+">B+</option>
                                            <!-- Add more blood group options as needed -->
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="religion"><strong>Religion:</strong></label></td>
                                    <td>
                                        <select id="religion" name="religion">
                                            <option value="Muslim">Muslim</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddhist">Buddhist</option>
                                            <option value="Christian">Christian</option>
                                        </select>
                                    </td>
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
                                    <td><input type="email" id="email" name="email" value="saad@gmail.com" /></td>
                                </tr>
                                <tr>
                                    <td><label for="phone"><strong>Phone (Mobile):</strong></label></td>
                                    <td><input type="tel" id="phone" name="phone" value="22469961" /></td>
                                </tr>
                                <tr>
                                    <td><label for="website"><strong>Website:</strong></label></td>
                                    <td><input type="url" id="website" name="website" value="https://saad.me" /></td>
                                </tr>
                                <tr>
                                    <td><b>Present Address:</b></td>
                                    <td><b>Country:</b></td>
                                    <td>
                                        <select name="country">
                                            <option>USA</option>
                                            <option>UK</option>
                                            <option>Bangladesh</option>
                                            <option>India</option>
                                            <option>Pakistan</option>
                                            <option>Sri Lanka</option>
                                            <option>Nepal</option>
                                            <option>Zimbabwe</option>
                                        </select>
                                    </td>
                                    <td><b>City:</b></td>
                                    <td>
                                        <select name="city">
                                            <option>Washington DC</option>
                                            <option>London</option>
                                            <option>Dhaka</option>
                                            <option>New Delhi</option>
                                            <option>Islamabad</option>
                                            <option>Colombo</option>
                                            <option>Kathmandu</option>
                                            <option>Harare</option>
                                        </select>
                                    </td>
                                    <td><b>Address 1:</b></td>
                                    <td><input type="text" name="address_1" style="width:150px" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>State:</b></td>
                                    <td>
                                        <select name="state">
                                            <option>Florida</option>
                                            <option>Manchester</option>
                                            <option>Kuril</option>
                                            <option>Uttar Pradesh</option>
                                            <option>Sindh</option>
                                            <option>Colombo</option>
                                            <option>Kathmandu</option>
                                            <option>Harare</option>
                                        </select>
                                    </td>
                                    <td><b>Postal Code:</b></td>
                                    <td><input type="text" name="zip_code" style="width:150px" /></td>
                                    <td><b>Address 2:</b></td>
                                    <td><input type="text" name="address_2" style="width:150px" /></td>
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
