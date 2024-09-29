<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Save the personal info in the session
    $_SESSION['personal_info'] = [
        'full_name' => $_POST['full_name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone']
    ];

    // Redirect to the next form step
    header('Location: education.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 1: Personal Information</title>
</head>
<body>
    <h2>Step 1: Personal Information</h2>
    <form method="POST" action="personal-info.php">
        <label>Full Name:</label><br>
        <input type="text" name="full_name" required><br><br>

        <label>Email Address:</label><br>
        <input type="email" name="email" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" required><br><br>

        <label>Phone Number:</label><br>
        <input type="text" name="phone" required><br><br>

        <input type="submit" value="Next">
    </form>
</body>
</html>
