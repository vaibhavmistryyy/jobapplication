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
    <title>Login Form</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <label>
            <input type="checkbox" name="remember"> Remember Me
        </label><br><br>

        <input type="submit" name="submit" value="Login">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Read the users from the users.json file
        if (file_exists('users.json')) {
            $users = json_decode(file_get_contents('users.json'), true);

            $isValid = false;

            // Loop through each user and validate credentials
            foreach ($users as $user) {
                if ($user['username'] == $username && password_verify($password, $user['password'])) {
                    // Start the session and set session variables
                    session_start();
                    $_SESSION['username'] = $username;

                    // If "Remember Me" is checked, set a cookie
                    if (isset($_POST['remember'])) {
                        setcookie('username', $username, time() + (86400 * 7), "/"); // 7 days
                    }

                    // Redirect to the job form
                    header('Location: job-form.php');
                    exit;
                }
            }

            // If credentials don't match, show an error
            if (!$isValid) {
                echo "Invalid username or password.";
            }
        } else {
            echo "No users found. Please register first.";
        }
    }
    ?>
</body>
</html>
