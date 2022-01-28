<?php
function check_user() {
    if (isset($_SESSION['root'])) {
        header('location: Home.php');
    }
} 
function check_root() {
    if (!isset($_SESSION['root']) || !$_SESSION['root']) {
        header('location: login.php');
    }
}
function logout() {
    if (isset($_POST['logout'])) {
        session_destroy();
        header('location: login.php');
    } 
} 
?>


