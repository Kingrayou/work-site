<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture the form data with basic validation/sanitization
    $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $username = filter_input(INPUT_POST, 'newUsername', FILTER_SANITIZE_STRING);
    $password = $_POST['newPassword']; // Still needs to be hashed
    $currentWeight = filter_input(INPUT_POST, 'currentWeight', FILTER_VALIDATE_INT);
    $weightGoal = filter_input(INPUT_POST, 'weightGoal', FILTER_VALIDATE_INT);
    $rateOfLoss = filter_input(INPUT_POST, 'rateOfLoss', FILTER_VALIDATE_INT);
    $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
    $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_INT);
    $dietaryRestrictions = filter_input(INPUT_POST, 'dietaryRestrictions', FILTER_SANITIZE_STRING);
    $preferredWorkouts = filter_input(INPUT_POST, 'preferredWorkouts', FILTER_SANITIZE_STRING);

    // Database credentials should be securely stored or defined in another secure way
    $dbHost = 'localhost';
    $dbUser = 'yourDatabaseUser'; // Use a dedicated user
    $dbPass = 'yourDatabasePassword'; // Use a strong password
    $dbName = 'test';

    // Create a connection to the database using MySQLi
    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // Hash the password securely
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO users (fullname, email, username, password, currentWeight, weightGoal, rateOfLoss, age, height, dietaryRestrictions, preferredWorkouts) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Check if statement preparation was successful
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters and execute
    $stmt->bind_param("ssssiiiiiss", $fullname, $email, $username, $hashedPassword, $currentWeight, $weightGoal, $rateOfLoss, $age, $height, $dietaryRestrictions, $preferredWorkouts);
    
    if ($stmt->execute()) {
        // Registration successful
        echo "Registration successful! Thank you, " . htmlspecialchars($fullname, ENT_QUOTES, 'UTF-8') . ", for signing up.";
    } else {
        // Error during execution
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Not a POST request, redirect to form or display an error
    echo "Error: Form not submitted correctly.";
}
