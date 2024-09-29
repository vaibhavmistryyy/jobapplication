<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['next'])) {
    $_SESSION['full_name'] = $_POST['full_name'];
    $_SESSION['phone'] = $_POST['phone'];
    header('Location: education-form.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application - Step 1</title>
</head>
<body>
    <h2>Step 1: Personal Information</h2>
    <form method="POST" action="job-form.php">
        <label>Full Name:</label>
        <input type="text" name="full_name" value="<?php echo $_SESSION['full_name'] ?? ''; ?>" required><br><br>

        <label>Email:</label>
        <input type="email" value="<?php echo $_SESSION['username']; ?>" readonly><br><br>

        <label>Phone Number:</label>
        <input type="text" name="phone" value="<?php echo $_SESSION['phone'] ?? ''; ?>" required><br><br>

        <input type="submit" name="next" value="Next">
    </form>
</body>
</html>
