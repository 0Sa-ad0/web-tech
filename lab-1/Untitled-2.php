<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process the form data
        $firstName = $_POST["first-name"];
        $lastName = $_POST["last-name"];

        // Display the welcome message with submitted data
        echo "<h2>Welcome $firstName $lastName</h2>";
        
    }