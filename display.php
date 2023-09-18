<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Data</title>
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <h1 class="title">All Contact Details</h1>
    <table class="table">
        <thead class="thead">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Issue</th>
                <th>Comment</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody class="tbody">
            <?php
            include("connection.php");
            $sql = mysqli_query($con, "SELECT * FROM `user`");
            $row = mysqli_num_rows($sql);
            if ($row != 0) {
                while ($result = mysqli_fetch_assoc($sql)) {
                    echo "
                        <tr>
                        <td>" . $result['id'] . "</td>
                        <td>" . $result['user_name'] . "</td>
                        <td>" . $result['user_email'] . "</td>
                        <td>" . $result['user_issue'] . "</td>
                        <td>" . $result['user_comment'] . "</td>
                        <td class='update'><a href='update.php?id=$result[id]'>update</td>
                        </tr>
                    ";
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>