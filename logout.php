<?php
session_start();
session_destroy();

// Clear any cookies set for "Remember Me"
if (isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3600, "/"); // Expire the cookie
}

// Redirect to login page after a short delay
header('Refresh: 2; url=login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging Out</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        h2 {
            color: #5cb85c;
        }
        p {
            color: #555;
        }
        .success-message {
            margin-top: 20px;
            color: #5cb85c;
            font-size: 18px;
        }
        .redirect-message {
            margin-top: 10px;
            color: #777;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h2>Successfully Logged Out</h2>
    <p class="success-message">You have been logged out.</p>
    <p class="redirect-message">Redirecting to the login page...</p>
</body>
</html>
