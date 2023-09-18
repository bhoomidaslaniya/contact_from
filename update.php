<?php
include 'connection.php';
$id = $_GET['id'];
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $issue = $_POST['issue'];
    $comment = $_POST['comment'];

    $sql = "UPDATE `user` SET `user_name`='$name', `user_email`='$email', `user_issue`='$issue', `user_comment`='$comment' WHERE id=$id";
    $update = mysqli_query($con, $sql);

    if ($update) {

        header('Location:display.php');
        exit;
    } else {

        echo "Error updating user information: " . mysqli_error($con);
    }
}


$sql = "SELECT * FROM `user` WHERE id=$id";
$result = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Update</title>
    <script src="validation.js"></script>
</head>

<body class="body">
    <div class=" container">
        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <h2>Update From</h2>
                <form action="" method="POST" onsubmit="return validateForm()" onchange="return validateForm()" id="myForm">
                    <input type="text" name="name" class="field" id="name" placeholder="Name" value="<?php echo $user['user_name']; ?>">
                    <div id="nameError" class="error"></div>
                    <input type="email" name="email" class="field" id="email" placeholder="Email" value="<?php echo $user['user_email']; ?>">
                    <div id="emailError" class="error"></div>
                    <select name="issue" class="field" id="issue">
                        <option value="">Select</option>
                        <option value="query" <?php if ($user['user_issue'] === 'query') echo 'selected'; ?>>Query</option>
                        <option value="Feedback" <?php if ($user['user_issue'] === 'Feedback') echo 'selected'; ?>>Feedback</option>
                        <option value="Complaint" <?php if ($user['user_issue'] === 'Complaint') echo 'selected'; ?>>Complaint</option>
                        <option value="Other" <?php if ($user['user_issue'] === 'Other') echo 'selected'; ?>>Other</option>
                    </select>
                    <div id="issueError" class="error"></div>
                    <textarea name="comment" id="comment" class="field" placeholder="Comments"><?php echo $user['user_comment']; ?></textarea>
                    <div id="commentError" class="error"></div>
                    <button class="btn" type="submit" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>