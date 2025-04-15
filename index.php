<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="center">
            <h1>Registration</h1>
            <form method="post">
                <input type="text" name="fullname" placeholder="Full Name">
                <input type="text" name="username" placeholder="Username">
                <input type="text" name="password" placeholder="••••••••">
                <input type="submit" name="register" value="Register">
            </form>
            <p>
                <small>
                    Click <a href="login.php">here</a> to login.
                </small>
            </p>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashed = md5($password);

    $insert = mysqli_query($con, "INSERT INTO account (fullname, username, password) VALUES ('$fullname', '$username', '$hashed')");
    if ($insert) {
        echo "<script>alert('Success!')</script>";
    } else {
        echo "<script>alert('Unable to register!')</script>";
    }
}
?>