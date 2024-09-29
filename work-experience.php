<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Save work experience in the session
    $_SESSION['work_experience'] = [
        'job_title' => $_POST['job_title'],
        'company_name' => $_POST['company_name'],
        'years_of_experience' => $_POST['years_of_experience'],
        'responsibilities' => $_POST['responsibilities']
    ];

    // Redirect to the review page
    header('Location: review.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 3: Work Experience</title>
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
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical; /* Allows vertical resizing for textarea */
        }
        textarea {
            height: 100px; /* Set height for textarea */
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
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Step 3: Work Experience</h2>
        <form method="POST" action="work-experience.php">
            <label>Previous Job Title:</label>
            <input type="text" name="job_title" required>

            <label>Company Name:</label>
            <input type="text" name="company_name" required>

            <label>Years of Experience:</label>
            <input type="text" name="years_of_experience" required>

            <label>Key Responsibilities:</label>
            <textarea name="responsibilities" required></textarea>

            <input type="submit" value="Next">
        </form>
    </div>
</body>
</html>
