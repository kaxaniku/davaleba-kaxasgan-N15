<?php
    session_start();
    include 'helpers/connection.php'; include 'helpers/funcs.php';
    check_root();
    logout();
    if(isset($_GET['SPage']) && $_GET['SPage']) {
        $SPage = $_GET['SPage'];
    } else {
        $SPage = 'dashboard';
    }

    if(isset($_GET['action']) && $_GET['action']) {
        $action = $_GET['action'];
    } else {
        $action = 'main';
    }
    //Cookie
    if (isset($_COOKIE['BGmode']) && $_COOKIE['BGmode'] == "dark") {
        $mode = 'light';
        $BGmode = 'dark';
    } else {
        $mode = 'dark';
        $BGmode = 'light';
    }
?>

<html>
<head>
    <title>e</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body class="<?=$BGmode?>">

    

    <?php

    include 'components/design.php';
    include 'pages/'.$SPage.'/'.$action.'.php';
    
    ?>
    <script src="assets/js/AJAX_request.js"></script>

    </body>
</html>