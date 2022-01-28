<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<?php
session_start();
include 'helpers/connection.php'; include 'helpers/funcs.php';
check_user();
$error = '';
if (isset($_POST['action']) && $_POST['action'] == 'registration') {
$username = isset($_POST['username']) && $_POST['username'] != ""? $_POST['username'] : null;
$password = isset($_POST['password']) && $_POST['password'] != ""? $_POST['password'] : null;
$repeat_password = isset($_POST['repeat_password']) && $_POST['repeat_password'] !=""? $_POST['repeat_password'] : null;
if($username && $password && $repeat_password){
    if($password == $repeat_password){
        $password = md5($password);
        $sql = "INSERT INTO users (username,password) VALUES ('$username','$password')";
        $stm = $connection->query($sql);
        header('location: login.php');
    } else {
        $error = "repeat password doesn't match password";
    }
}else{
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
                <label for="repeat_password">repeat password</label>
                <input type="password" name="repeat_password">
            </div>
            <div class="form-group">
                <input type="hidden" name="action" value="registration">
                <button class="btn">Register</button>
                <a href="login.php" class="btn">Back</a>
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