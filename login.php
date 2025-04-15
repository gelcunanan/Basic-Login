<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="center">
            <h1>Login</h1>
            <form method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="text" name="password" placeholder="••••••••">
                <input type="submit" name="login" value="Login">
            </form>
            <p>
                <small>
                    Click <a href="index.php">here</a> to register.
                </small>
            </p>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashed = md5($password);

    $select = mysqli_query($con, "SELECT * FROM account WHERE username = '$username' AND password = '$hashed'");
    $count = mysqli_num_rows($select);
    if ($count > 0) {
        header('location: dashboard.php');
    } else {
        echo "<script>alert('Invalid credentials!')</script>";
    }
}
?>