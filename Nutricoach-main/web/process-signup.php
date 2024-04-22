<?php


$mysqli = require __DIR__ . "/Database.php";

$sql = "INSERT INTO user (fullname, email, newUsername, currentWeight, weightGoal, rateOfLoss, age, height, dietaryRestrictions, preferredWorkouts)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();
if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

// Assuming all numeric inputs are integers for simplicity.
$stmt->bind_param("sssiiiiiss", // Type specification string
    $_POST["fullname"],
    $_POST["email"],
    $_POST["newUsername"],
    $_POST["currentWeight"],
    $_POST["weightGoal"],
    $_POST["rateOfLoss"],
    $_POST["age"],
    $_POST["height"],
    $_POST["dietaryRestrictions"],
    $_POST["preferredWorkouts"]
    
);

if ($stmt->execute()) {
    echo "Record inserted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>
