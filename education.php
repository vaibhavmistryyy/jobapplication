<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Save educational background in the session
    $_SESSION['education'] = [
        'degree' => $_POST['degree'],
        'field_of_study' => $_POST['field_of_study'],
        'institution' => $_POST['institution'],
        'graduation_year' => $_POST['graduation_year']
    ];

    // Redirect to the next form step
    header('Location: work-experience.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 2: Educational Background</title>
</head>
<body>
    <h2>Step 2: Educational Background</h2>
    <form method="POST" action="education.php">
        <label>Highest Degree Obtained:</label><br>
        <input type="text" name="degree" required><br><br>

        <label>Field of Study:</label><br>
        <input type="text" name="field_of_study" required><br><br>

        <label>Name of Institution:</label><br>
        <input type="text" name="institution" required><br><br>

        <label>Year of Graduation:</label><br>
        <input type="text" name="graduation_year" required><br><br>

        <input type="submit" value="Next">
    </form>
</body>
</html>
