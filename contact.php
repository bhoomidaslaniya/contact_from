<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $issue = $_POST['issue'];
    $comment = $_POST['comment'];

    if (empty($name) || empty($email) || empty($issue) || empty($comment)) {
        header("location: contact.php");
    } else {
        $sql = "INSERT INTO `user`(`user_name`, `user_email`, `user_issue`, `user_comment`) VALUES ('$name','$email','$issue','$comment')";
        $insert = mysqli_query($con, $sql);

        if ($insert) {
            header("location: display.php");
        } else {
            echo "Error adding data: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Contact</title>
    <script>

    </script>
</head>

<body class="body">
    <div class="container">
        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <h2>Contact Us</h2>
                <form action="" method="POST" onsubmit="return validateForm()" onchange="return validateForm()" id="myForm">
                    <input type="text" name="name" class="field" id="name" placeholder="Name">
                    <div id="nameError" class="error"></div>
                    <input type="email" name="email" class="field" id="email" placeholder="Email">
                    <div id="emailError" class="error"></div>
                    <select name="issue" class="field" id="issue">
                        <option value="">Select</option>
                        <option value="query">Query</option>
                        <option value="Feedback">Feedback</option>
                        <option value="Complaint">Complaint</option>
                        <option value="Other">Other</option>
                    </select>
                    <div id="issueError" class="error"></div>
                    <textarea name="comment" id="comment" class="field" placeholder="Comments"></textarea>
                    <div id="commentError" class="error"></div>
                    <button class="btn" type="submit" name="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="validation.js"></script>

</html>