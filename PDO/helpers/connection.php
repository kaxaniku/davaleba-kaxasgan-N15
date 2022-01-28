<?php

$connection = new PDO("mysql:host=localhost;dbname=blog", 'root', '');


function gA($sql){
    global $connection;
    $stm = $connection->query($sql);
    return $stm->fetchAll();
}


function gF($sql){
    global $connection;
    $stm = $connection->query($sql);
    return $stm->fetch();
}
