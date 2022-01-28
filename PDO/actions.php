<?php
include 'helpers/connection.php';
if (isset($_POST['action']) && $_POST['action'] == 'change-mode') {
    setcookie('BGmode',$_POST['mode'],time() + 86400);
    echo "OK";
}

if (isset($_POST['action']) && $_POST['action'] == 'subscribe') {
    $name = isset($_POST['name']) && $_POST['name']? $_POST['name'] : null;
    $email = isset($_POST['email']) && $_POST['email']? $_POST['email'] : null;
    $phone = isset($_POST['phone']) && $_POST['phone']? $_POST['phone'] : null;
    $sql = "INSERT INTO subscribers (name,email,phone) VALUES ('$name','$email','$phone')";
    $stm = $connection->query($sql);
    echo 'OK';
}
?>