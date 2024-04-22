<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "Database.php";

    $sql = sprintf("SELECT * FROM user
    WHERE email = '%s'"
    $_POST["email"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Signup Page | Fitclub</title>
</head>
<body>
    <nav>
        <div class="nav__logo">
            <a href="index.html"><img src="assets/logo.png" alt="logo"/></a>
        </div>
        <ul class="nav__links">
            <li class="link"><a href="home.html">Home</a></li>
            <li class="link"><a href="meals.html">Meals</a></li>
            <li class="link"><a href="workouts.html">Workouts</a></li>
            <li class="link"><a href="customize.html">Customize</a></li>
            <li class="link"><a href="settings.html">Settings</a></li>
        </ul>
        <button class="btn">Sign In</button>
    </nav>

    <section class="section__container">
        <div class="signup__header">
            <h2 class="section__header">Sign Up</h2>
        </div>
        <div class="form__container">
            <form method="post">
   
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="newPassword">Password:</label>
                    <input type="password" id="newPassword" name="newPassword" required>
                </div>

                <button type="submit" class="btn">Log In</button>
            </form>
        </div>
        <p class="form-footer">Already have an account? <a href="index.html">Login</a></p>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.js"></script>
   
