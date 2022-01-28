<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<?php
session_start();
include 'helpers/connection.php'; include 'helpers/funcs.php';
check_user();
$error = '';
if (isset($_POST['action']) && $_POST['action'] == 'login') {
$username = isset($_POST['username']) && $_POST['username'] != ""? $_POST['username'] : null;
$password = isset($_POST['password']) && $_POST['password'] != ""? $_POST['password'] : null;
$sql = "SELECT * FROM users WHERE username = '$username'";
$user = gF($sql);
if ($username && $password) {
    if ($user) {
        if ($user['password'] == md5($password)) {
            $_SESSION['UserName'] = $username;
            $_SESSION['root'] = true;
            header('location: Home.php');
        } else {
            $error = 'incorrect password';
        }
    } else {
        $error = "entered username doesn't exist";
    }
} else {
    $error = 'please fill in all the fields';
}
}
?>
<body>
    <div class="login_container">
    <div class="content">
        <form action="" method="post">
            <div class="form-group">
                <label for="username">username</label>
                <input type="text" name="username">
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="password" name="password">
            </div>
            <div class="form-group">
                <input type="hidden" name="action" value="login">
                <button class="btn">Login</button>
                <a href="registration.php" class="btn">Registration</a>
            </div>
            <?php
            if ($error) {
                echo $error;
            } 
            ?>
        </form>
    </div>
    </div>
</body>
</html>