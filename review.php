<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Gather all session data into one array
    $application = [
        'personal_info' => $_SESSION['personal_info'],
        'education' => $_SESSION['education'],
        'work_experience' => $_SESSION['work_experience']
    ];

    // Store the application in applications.json
    if (file_exists('applications.json')) {
        $applications = json_decode(file_get_contents('applications.json'), true);
    } else {
        $applications = [];
    }

    $applications[] = $application;
    file_put_contents('applications.json', json_encode($applications));

    // Show confirmation and clear session
    session_destroy();
    echo "<div class='success-message'>Application successfully submitted!</div>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review and Submit</title>
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
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            color: #5cb85c; /* Different color for section headings */
        }
        p {
            margin: 5px 0;
            color: #555;
        }
        .success-message {
            text-align: center;
            color: #5cb85c;
            margin-top: 20px;
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
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Review Your Application</h2>

        <h3>Personal Information</h3>
        <p>Full Name: <?php echo htmlspecialchars($_SESSION['personal_info']['full_name']); ?></p>
        <p>Email: <?php echo htmlspecialchars($_SESSION['personal_info']['email']); ?></p>
        <p>Phone: <?php echo htmlspecialchars($_SESSION['personal_info']['phone']); ?></p>

        <h3>Educational Background</h3>
        <p>Degree: <?php echo htmlspecialchars($_SESSION['education']['degree']); ?></p>
        <p>Field of Study: <?php echo htmlspecialchars($_SESSION['education']['field_of_study']); ?></p>
        <p>Institution: <?php echo htmlspecialchars($_SESSION['education']['institution']); ?></p>
        <p>Year of Graduation: <?php echo htmlspecialchars($_SESSION['education']['graduation_year']); ?></p>

        <h3>Work Experience</h3>
        <p>Job Title: <?php echo htmlspecialchars($_SESSION['work_experience']['job_title']); ?></p>
        <p>Company Name: <?php echo htmlspecialchars($_SESSION['work_experience']['company_name']); ?></p>
        <p>Years of Experience: <?php echo htmlspecialchars($_SESSION['work_experience']['years_of_experience']); ?></p>
        <p>Key Responsibilities: <?php echo htmlspecialchars($_SESSION['work_experience']['responsibilities']); ?></p>

        <form method="POST" action="review.php">
            <input type="submit" value="Submit Application">
        </form>
    </div>
</body>
</html>
