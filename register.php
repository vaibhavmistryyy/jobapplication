<?php
// Enable error reporting to see if there's an issue
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        .success-message {
            text-align: center;
            color: #5cb85c;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <form method="POST" action="register.php">
            <label>Username:</label>
            <input type="text" name="username" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <input type="submit" name="submit" value="Register">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Check if users.json exists, if not, create an empty array
            if (file_exists('users.json')) {
                $users = json_decode(file_get_contents('users.json'), true);
            } else {
                $users = [];
            }

            // Add the new user to the users array
            $users[] = [
                'username' => $username,
                'email' => $email,
                'password' => $password
            ];

            // Save the users array back to users.json
            file_put_contents('users.json', json_encode($users));

            echo "<div class='success-message'>Registration successful!</div>";
        }
        ?>
    </div>
</body>
</html>
