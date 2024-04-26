<?php
require_once (__DIR__ . "/../config/mysql.php");
?>




<?php

$my_connection = new PDO(
    "{$bd}:host={$host};dbname={$dbname};charset=utf8",
    $user,
    $password,
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
);


?>